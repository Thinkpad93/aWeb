import axios from 'axios';
import qs from 'qs';
import { Toast } from 'vant';
import { showLoading, closeLoading } from './loading';
import aliLog from '@/utils/aliLog';
import router from '@/router';

// eslint-disable-next-line no-unused-vars
const origin = window.location.origin;
// eslint-disable-next-line no-unused-vars
const pathname = window.location.pathname;

const service = axios.create({
  baseURL: process.env.VUE_APP_BASE_API
});

function sendApiLog(option, res) {
  if (!option.isIgnoreLog) {
    aliLog.logger.track({
      __topic__: 'interface-log',
      path: `${origin}${pathname}#${router.currentRoute.fullPath}`,
      params: option.data && JSON.stringify(option.data) || '',
      request_type: option.method.toUpperCase(),
      remark: JSON.stringify({
        url: option.url,
        result: res && JSON.stringify(res) || ''
      })
    });
  }
}

/**
 * http请求
 * @param {Object}  option         请求option
 * @param {String}  option.method  请求方式
 * @param {String}  option.url     请求url
 * @param {Object}  option.data    请求参数
 * @param {Object}  option.loading loading配置信息(vant的toast.loading)
 * @param {Boolean} option.loading.show 显示loading
 * @param {Object}  option.config  自定义axios config
 * @param {Boolean} option.isSerialized 数据是否已序列化
 * @param {Boolean} option.isReturnResponse 返回整个response
 * @param {Boolean} option.isReturnError 接口非200时，返回结果
 * @param {Boolean} option.isIgnoreLog 不需要日志埋点
 */
function request(option) {
  return new Promise((resolve, reject) => {
    let config = {
      method: option.method,
      url: option.url,
      ...option.config
    };
    if (option.method === 'get') {
      config.params = option.data;
    } else {
      let requestData;
      if (option.isSerialized) {
        requestData = option.data;
      } else {
        requestData = qs.stringify(option.data);
      }
      config.data = requestData;
    }
    if (option.loading?.show) {
      showLoading(option.loading);
    }
    service(config).then(response => {
      let data = response.data;
      sendApiLog(option, data);
      if (option.loading?.show) {
        closeLoading();
      }
      if (option.isReturnResponse) {
        resolve(response);
      } else if (option.isReturnResult) {
        resolve(data);
      } else if (data.code == 200) {
        resolve(data);
      } else if (data.message) {
        // 通用接口提示
        Toast({
          message: data.message,
          forbidClick: true
        });
      }
    }).catch(error => {
      let data = error.response.data;
      sendApiLog(option, data);
      if (option.loading?.show) {
        closeLoading();
      }
      if (option.isReturnError) {
        reject(data);
      } else if (data.message) {
        Toast({
          message: data.message,
          forbidClick: true
        });
      }
    });
  });
}

request.post = function(option) {
  return request({
    method: 'post',
    ...option
  });
};

request.get = function(option) {
  return request({
    method: 'get',
    ...option
  });
};

request.put = function(option) {
  return request({
    method: 'put',
    ...option
  });
};

request.delete = function(option) {
  return request({
    method: 'delete',
    ...option
  });
};

request.install = (Vue) => {
  Vue.prototype.$request = request;
};

export default request;
