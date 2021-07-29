<template>
  <div class="page">
    <div class="page-hd">
      <img src="../assets/banner.png" alt="">
    </div>
    <div class="page-bd">
      <van-popup
        v-model="show"
        position="bottom">
        <van-datetime-picker
          v-model="currentTime"
          type="time"
          title="选择时间"
          @confirm="dateConfirm"
        />
      </van-popup>
      <h3>请填写下方信息</h3>
      <p>
        请如实填写，提交申请后并通过基础审核后，我们的客服人员将会第一时间联系您并帮您开通平台公会系统。
        <br />
        *凡恶意申请开通公会，扰乱平台运营秩序者，将进行封号惩罚!
      </p>
      <form ref="form" class="form" method="post">
        <div class="form-item flex">
          <label for="">公会名称</label>
          <div>
            <input class="input" v-model="form.name" type="text" maxlength="6" placeholder="请输入公会名称" />
          </div>
        </div>
        <div class="form-item flex">
          <label for="">厅名称</label>
          <div>
            <input class="input" v-model="form.roomTitle" type="text" maxlength="8" placeholder="请输入厅名称" />
          </div>
        </div>
        <div class="form-item flex">
          <label for="">厅品类</label>
          <div class="flex roomTag">
            <select class="select" v-model="form.roomTag">
              <option value="" disabled selected>请选择厅品类</option>
              <option v-for="item in options" :key="item.value" :value="item.value">{{ item.name }}</option>
            </select>
          </div>
        </div>
        <div class="form-item flex">
          <label for="">开厅时间段</label>
          <div class="flex opening-time">
            <input
              class="input startTime"
              v-model="startTime"
              type="text"
              readonly
              placeholder="选择时间"
              @click="show = true; hanldType = 'start'"
            />
            <span>至</span>
            <input
              class="input endTime"
              v-model="endTime"
              type="text"
              readonly
              placeholder="选择时间"
              @click="show = true; hanldType = 'end'"
            />
          </div>
        </div>
        <div class="form-item flex">
          <label for="">会长昵称</label>
          <div>
            <input class="input" v-model="form.nick" type="text" maxlength="10" placeholder="请输入会长昵称" />
          </div>
        </div>
        <div class="form-item flex">
          <label for="">会长真实姓名</label>
          <div>
            <input class="input" v-model="form.realName" type="text" maxlength="25" placeholder="请输入会长真实姓名" />
          </div>
        </div>
        <div class="form-item flex">
          <label for="">会长手机号</label>
          <div>
            <input class="input" v-model="form.phone" type="tel" placeholder="请输入会长手机号" />
          </div>
        </div>
        <div class="form-item flex">
          <label for="">会长微信号</label>
          <div>
            <input class="input" v-model="form.wechat" type="text" maxlength="20" placeholder="请输入会长微信号" />
          </div>
        </div>
      </form>
      <app-button type="primary" class="btn" @click="submit" :disabled="isOpen">提交</app-button>
    </div>
  </div>
</template>

<script>
import { guildIsOpen, guildOpen } from '@/api/guild';
export default {
  name: 'GuildOpen',
  data() {
    return {
      isReset: true,
      show: false,
      currentTime: '',
      hanldType: 'start',
      startTime: '', // 开厅时间段-开始
      endTime: '', // 开厅时间段-结束
      form: {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket,
        name: '',
        roomTitle: '',
        roomTag: '',
        startTime: '',
        endTime: '',
        nick: '',
        realName: '',
        phone: null,
        wechat: ''
      },
      isOpen: false,
      options: [
        { name: '女神', value: '女神' },
        { name: 'FM', value: 'FM' },
        { name: '男神', value: '男神' },
        { name: '大神带飞', value: '大神带飞' },
        { name: '点唱', value: '点唱' },
        { name: 'Pia戏', value: 'Pia戏' },
        { name: '交友', value: '交友' }
      ] // 厅品类数据
    }
  },
  created() {
    // this.getTagV2Top();
    this.guildIsOpen();
  },
  mounted() {
    document.body.addEventListener('focusin', e => {
      // 软键盘弹出的事件处理
      this.isReset = false;
    });
    document.body.addEventListener('focusout', e => {
      // 软键盘收起的事件处理
      this.isReset = true;
      setTimeout(() => {
        if (this.isReset) {
          let { top } = e.target.getBoundingClientRect()
          window.scrollTo(0, top);
        }
      }, 30);
    });
  },
  methods: {
    dateConfirm(value) {
      if (this.hanldType == 'start') {
        this.startTime = value;
      } else {
        this.endTime = value;
      }
      this.show = false;
      this.currentTime = '';
    },
    submit() {
      this.clickForm();
    },
    clickForm() {
      let message = '';
      let {
        name,
        roomTitle,
        roomTag,
        nick,
        realName,
        phone,
        wechat
      } = this.form;
      if (name == '') {
        message += '请输入公会名称<br/>';
      }
      if (roomTitle == '') {
        message += '请输入厅名称<br/>';
      }
      if (!roomTag) {
        message += '请选择厅品类<br/>';
      }
      if (this.startTime == '' || this.endTime == '') {
        message += '请选择开厅时间段<br/>';
      }
      if (nick == '') {
        message += '请输入会长昵称<br/>';
      }
      if (realName == '') {
        message += '请输入会长真实姓名<br/>';
      }
      if (!this.$utils.isPhone(phone)) {
        message += '请正确输入会长手机号<br/>';
      }
      if (wechat == '') {
        message += '请输入会长微信号';
      }
      if (message.length) {
        this.$dialog.alert({
          confirmButtonColor: '#ff5c9d',
          title: '提示',
          message
        }).then(() => {});
      } else {
        this.guildOpen();
      }
    },
    // 申请开通公会
    guildOpen() {
      this.form.startTime = this.startTime.replace(':', '') + '00';
      this.form.endTime = this.endTime.replace(':', '') + '00';
      guildOpen({ data: this.form }).then(res => {
        if (res.code === 200) {
          this.isOpen = true;
          this.$refs.form.reset();
          this.$dialog.alert({
            confirmButtonColor: '#ff5c9d',
            title: '您已经提交申请',
            confirmButtonText: '知道了',
            message: '审核通过后，我们的工作人员将会在1-3个工作日联系您，请耐心等待，谢谢～'
          }).then(() => {
            this.$utils.appTools.callMethod('closeWebView');
          });
        }
      });
    },
    // 是否正在申请开通公会
    guildIsOpen() {
      guildIsOpen({ data: {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      }}).then(res => {
        if (res.code === 200) {
          let isOpen = res.data.isOpen;
          if (isOpen) {
            this.isOpen = true;
            this.$dialog.alert({
              confirmButtonColor: '#ff5c9d',
              title: '您已经提交申请',
              confirmButtonText: '知道了',
              message: '审核通过后，我们的工作人员将会在1-3个工作日联系您，请耐心等待，谢谢～'
            }).then(() => {
              // 关闭webView
              this.$utils.appTools.callMethod('closeWebView');
            });
          }
        }
      });
    }
    // 首页派对顶部标签
    // getTagV2Top() {
    //   this.$request.get({
    //     url: '/room/tag/v2/top',
    //     data: {}
    //   }).then(({ data }) => {
    //     this.options = data.filter(item => item.id != 17 && item.id != 18);
    //   });
    // }
  }
}
</script>

<style lang="scss" scoped>
.page {
  font-size: 12px;
  scroll-behavior: smooth;
}
.page-hd {
  img {
    max-width: 100%;
    vertical-align: top;
  }
}
.page-bd {
  padding: px2rem(32) px2rem(44) px2rem(32) px2rem(32);

  p {
    color: #8c8c8c;
    line-height: 1.6;
    text-align: justify;
    margin-top: px2rem(16);
    margin-bottom: px2rem(40);
  }

  .btn {
    position: relative;
    margin-top: px2rem(72);
    background: linear-gradient(90deg, #FF5C9D 0%, #FFAEBF 100%);
  }
}
.form {
  label {
    display: inline-block;
  }
  &-item {
    align-items: center;
    justify-content: space-between;
    margin-bottom: px2rem(24);
  }
  .startTime,
  .endTime {
    width: px2rem(220);
    min-width: px2rem(196);
    padding: 0 8px;
  }
}
.input {
  appearance: none;
  min-width: px2rem(500);
  height: px2rem(88);
  font-size: 14px;
  padding: 0 16px;
  border: 1px solid #f5f5f5;
  border-radius: px2rem(50);
  background-color: #f5f5f5;
  transition: border ease .3s;
  &:focus {
    border: 1px solid #FFAEBF;
  }
}
.select {
  position: relative;
  min-width: px2rem(500);
  height: px2rem(88);
  border-radius: px2rem(50);
  padding: 0 16px;
  appearance: none;
  border: 1px solid #f5f5f5;
  background-color: #f5f5f5;
  background-image: url(./assets/ic_arrow_down.png);
  background-position: 96% center;
  background-repeat: no-repeat;
  background-size: 16px 16px;

  &:focus {
    outline: none;
  }
}
.opening-time {
  align-items: center;
  span {
    display: inline-block;
    margin: 0 px2rem(10);
  }
}
</style>