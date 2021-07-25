<template>
  <div class="page">
    <header-bar title="我的签约"></header-bar>
    <div class="page-bd">
      <dialogs
        :title="titleText"
        :show-confirm-button="false"
        :close-on-click-overlay="false"
        :show-dialog.sync="pageDialog.one">
        <!-- 申请签约1 or 申请续约2 -->
        <div class="mod duration" v-if="hanldType == 1 || hanldType == 2">
          <section
            class="section"
            style="color: #8c8c8c"
            v-if="info.status === 0">
            * 同一实名认证信息下的所有账号只能签约同一个公会
          </section>
          <section
            class="section"
            style="color: #8c8c8c"
            v-if="info.status === 2">
            已签约<span v-if="info.days">{{ info.days / 30 }}个月</span>
            （{{ info.signDate | formatDate('yyyy.MM.dd') }}-{{ info.expireDate | formatDate('yyyy.MM.dd') }}）
          </section>
          <section class="section mod-tips">请选择签约时长: </section>
          <section class="section duration-list flex">
            <div
              class="option flex"
              :class="{ 'checked': active == index }"
              v-for="(item, index) in durationList"
              :key="index"
              @click="changeDuration(item, index)">
              {{ item.title }}
            </div>
          </section>
          <section class="section flex a-i-c">
            <input id="checkbox" type="checkbox" v-model="checked" />
            <label for="checkbox">我已充分阅读并同意</label>
            <router-link to="/guildRule/guildContract" style="color: #4488ff">《签约须知》</router-link>
          </section>
          <section class="section signing-btn-group">
            <app-button type="primary" class="btn" @click="secondaryConfirm" v-if="hanldType == 1">发送签约申请</app-button>
            <app-button type="primary" class="btn" @click="secondaryConfirm" v-else>发送续约申请</app-button>
            <app-button type="info" class="btn" @click="pageDialog.one = false;">我再想想</app-button>
          </section>
        </div>
        <!-- 申请解约3 -->
        <div class="mod termination" v-if="hanldType == 3">
          <section class="section" style="font-size: 14px;">解约后，同一实名认证信息下的所有账号均会与该公会解约</section>
          <section class="section mod-tips" style="color: #8c8c8c">请选择解约方式</section>
          <section class="section termination-list">
            <div
              class="option flex"
              v-for="(item, index) in terminationList"
              :key="index"
              @click="changeTermination(item)">
              <p v-html="item.message"></p>
            </div>
          </section>
          <section class="section">
            <app-button type="primary" class="btn br12" @click="pageDialog.one = false;">我再想想</app-button>
          </section>
        </div>
      </dialogs>
      <!-- 弹窗二 -->
      <dialogs
        :title="configInfo.title"
        :show-dialog.sync="pageDialog.two"
        :show-cancel-button="true"
        :confirm-button-text="configInfo.confirmButtonText"
        :cancel-button-text="configInfo.cancelButtonText"
        :before-close="beforeClose"
        @open="open">
        <p class="guild_message" v-html="configInfo.message"></p>
      </dialogs>
      <!-- 弹窗三 -->
      <dialogs
        :title="configSuccessInfo.title"
        :show-dialog.sync="pageDialog.three"
        :before-close="configSuccessInfo.beforeClose"
        @open="open">
        <p class="guild_message" v-html="configSuccessInfo.message"></p>
      </dialogs>
      <!-- 弹窗四 -->
      <dialogs
        title="请回答以下问题，确认您已了解签约流程"
        :overlay="false"
        confirm-button-text="提交答案"
        :show-cancel-button="true"
        :show-dialog.sync="pageDialog.four"
        :before-close="handldAnswer">
        <div class="form">
          <form class="form-main" ref="form">
            <h4>1、关于签约，以下说法正确的是?</h4>
            <div class="form-element flex">
              <div>
                <input type="radio" id="one" :value="1" v-model="form.field_1">
              </div>
              <label for="one">此账号与公会签约成功后不会影响其他账号的签约</label>
            </div>
            <div class="form-element flex">
              <div>
                <input type="radio" id="two" :value="2" v-model="form.field_1">
              </div>
              <label for="two">此账号与公会签约成功后，同一实名认证信息下的其他账号只能签约同一个公会</label>
            </div>
            <h4>2、关于解约，以下说法正确的是?</h4>
            <div class="form-element flex">
              <div>
                <input type="radio" id="five" :value="5" v-model="form.field_2">
              </div>
              <label for="five">可自由解约</label>
            </div>
            <div class="form-element flex">
              <div>
                <input type="radio" id="six" :value="6" v-model="form.field_2">
              </div>
              <label for="six">可向会长发起解约申请，但会长拒绝的情况下强制解约，需缴纳违约金</label>
            </div>
          </form>
        </div>
      </dialogs>
      <div class="setup">
        <div class="item flex">
          <div class="hd">所在公会</div>
          <div class="bd">
            <p>{{ info.guildInfo.name }}</p>
          </div>
        </div>
        <div class="item flex">
          <div class="hd">公会会长</div>
          <div class="bd">
            <p>{{ info.leaderInfo.nick }}</p>
          </div>
        </div>
        <div class="item flex">
          <!-- 签约状态 0-未签约, 1-申请签约中, 2-已签约, 3-申请解约中, 4-已到期 -->
          <div class="hd">签约状态</div>
          <div class="bd">
            <p
              class="status"
              :class="[`statusTips-${info.status}`]">
              <span>{{ info.status | statusText }}</span>
            </p>
          </div>
        </div>
        <div class="item flex" v-if="info.status > 0">
          <div class="hd">签约时段</div>
          <div class="bd">
            <p v-if="info.signDate">
              {{ info.signDate | formatDate('yyyy.MM.dd') }}
              -
              {{ info.expireDate | formatDate('yyyy.MM.dd') }}
            </p>
            <p v-else>
              {{ info.applySignDate | formatDate('yyyy.MM.dd') }}
              -
              {{ info.applyExpireDate | formatDate('yyyy.MM.dd') }}
            </p>
          </div>
        </div>
        <div class="item flex" v-if="info.status == 5">
          <div class="hd">申请续约时段</div>
          <div class="bd">
            <p>
              {{ info.applySignDate | formatDate('yyyy.MM.dd') }}
              -
              {{ info.applyExpireDate | formatDate('yyyy.MM.dd') }}
            </p>
          </div>
        </div>
      </div>
      <div class="btn-group">
        <app-button
          v-if="info.status === 0"
          type="primary"
          class="btn"
          @click="handleApply(1)">
          申请签约
        </app-button>
        <app-button
          v-if="info.status === 2 || info.status === 4"
          type="primary"
          class="btn"
          @click="handleApply(2)">
          申请续约
        </app-button>
        <app-button
          v-if="info.status === 2"
          type="info"
          class="btn plain"
          @click="handleApply(3)">
          申请解约
        </app-button>
      </div>
      <!-- 密码 -->
      <password-input :show-keyboard="showKeyboard" @password="passwordChange"></password-input>
    </div>
  </div>
</template>

<script>
import { tomorrow } from '@/utils';
import { contractMine, contractSignApply, contractRelieveApply, getExchangeMsg } from '@/api/guild';
import { HeaderBar, Dialogs } from '@/components';
import PasswordInput from '@/components/PasswordInput';
export default {
  name: 'GuildContractMine',
  components: {
    HeaderBar,
    Dialogs,
    PasswordInput
  },
  data() {
    return {
      active: -1,
      type: 2,
      checked: false,
      showKeyboard: false,
      hanldType: 1,
      form: {
        field_1: null,
        field_2: null
      },
      pageDialog: {
        one: false,
        two: false,
        three: false,
        four: false
      },
      info: {
        guildInfo: {},
        leaderInfo: {}
      },
      exchangeMsg: {}, // 用户绑定信息
      query: {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      },
      durationList: [
        { title: '6个月', days: 6 * 30 },
        { title: '12个月', days: 12 * 30 }
      ],
      terminationList: [
        { type: 2, message: '发送解约申请<br />（需等待会长同意）' },
        { type: 3, message: '向会长缴纳违约金<br />（直接解约并退出公会）' }
      ],
      config: {
        1: {
          title: '是否发送签约申请',
          message: '会长同意后，您将与该公会签约。签约成功后，同一实名认证信息下的多个账号只能签约同一个公会',
          cancelButtonText: '我再想想',
          confirmButtonText: '发送签约申请'
        },
        2: {
          title: '是否发送续约申请',
          message: '',
          cancelButtonText: '我再想想',
          confirmButtonText: '发送续约申请'
        },
        3: {
          2: {
            title: '是否确认发送解约申请',
            message: '会长同意后，您将与该公会解约。如果您同一实名认证信息下的其他账号也签约了此公会，均会一同解约',
            cancelButtonText: '我再想想',
            confirmButtonText: '发送解约申请'
          },
          3: {
            title: '是否确认向会长支付违约金？',
            message: `如选择直接解约，需向会长支付<span style="color: #ff5c9d"><span class="liquidatedDamages">0</span>金豆</span>作为违约金；支付后，同一实名认证信息下的所有签约账号均会与该公会解约并退出公会`,
            cancelButtonText: '我再想想',
            confirmButtonText: '支付违约金'
          }
        }
      },
      configTwo: {
        1: {
          title: '',
          message: ''
        },
        2: {
          title: '',
          message: ''
        },
        3: {
          2: {
            title: `已发送解约申请`,
            message: `已发送提前解约申请，请耐心等待会长审核~`
          },
          3: {
            title: `已成功解约并退出该公会`,
            message: `您已向会长支付<span style="color: #ff5c9d"><span class="liquidatedDamages">0</span>金豆</span>违约金，并已成功解约并退出该公会~`,
            beforeClose: (action, done) => {
              if (action === 'confirm') {
                this.$utils.appTools.closeWebView();
              }
            }
          }
        }
      }
    }
  },
  computed: {
    configInfo() {
      if (this.hanldType === 3) {
        return this.config[this.hanldType][this.type];
      } else {
        return this.config[this.hanldType];
      }
    },
    configSuccessInfo() {
      if (this.hanldType === 3) {
        return this.configTwo[this.hanldType][this.type];
      } else {
        return this.configTwo[this.hanldType];
      }
    },
    titleText() {
      switch(this.hanldType) {
        case 1:
          return '申请签约';
        case 2:
          return '申请续约';
        case 3:
          return '申请提前解约';
        default:
          return '';
      }
    }
  },
  created() {
    this.contractMine();
    // this.getExchangeMsg();
  },
  filters: {
    statusText(value) {
      switch(value) {
        case 0:
          return '未签约';
        case 1:
          return '申请签约中';
        case 2:
          return '已签约';
        case 3:
          return '申请解约中';
        case 4:
          return '已到期';
        case 5:
          return '申请续约中';
        default:
          return '';
      }
    }
  },
  methods: {
    open() {
      this.$nextTick(() => {
        const element = document.querySelectorAll('.liquidatedDamages');
        if (element.length) {
          for (let i = 0; i < element.length; i++) {
            element[i].innerHTML = this.info?.liquidatedDamages;
          }
        }
      });
    },
    // 输入支付密码
    passwordChange(value) {
      this.$nextTick(() => {
        // 强制解约
        if (this.type === 3) {
          contractRelieveApply({
            data: {
              uid: this.$state.info.uid,
              ticket: this.$state.info.ticket,
              type: this.type,
              pwd: this.$rsa.encrypt(value)
            },
            loading: {
              show: true,
              message: '支付中...'
            }
          }).then(res => {
            if (res.code === 200) {
              this.showKeyboard = false;
              this.pageDialog.three = true;
              this.contractMine();
            }
          });
        }
      });
    },
    // 申请
    handleApply(hanldType) {
      this.hanldType = hanldType;
      this.pageDialog.one = true;
    },
    // 回答问题
    handldAnswer(action, done) {
      if (action === 'confirm') {
        let result = 0;
        const form = this.form;
        for (let field in form) {
          if (form[field] == null) {
            this.$toast('请填写所有问题哦~');
            done(false);
          } else if (form[field] % 2 === 0) {
            result++;
          } else {
            this.$toast('很遗憾，回答错误；为了您的权益，建议您重新了解《签约流程》');
            done(false);
          }
        }
        if (Object.keys(this.form).length == result) {
          done();
          this.$toast({
            message: '恭喜您回答正确，可进行下一步~',
            position: 'bottom'
          });
          this.pageDialog.two = true;
          this.form = {
            field_1: null,
            field_2: null
          }
        }
      } else {
        done();
      }
    },
    // 点击切换选择签约时长
    changeDuration(item, index) {
      this.active = index;
      if (this.info.status == 2) {
        const { title, days } = item;
        const expireDate = this.info.expireDate;
        const formatExpirDate = this.$utils.formatDate(expireDate, 'yyyy.MM.dd');
        const _tomorrow = tomorrow(new Date(expireDate).getTime(), days).replace(/-/g, '.');
        this.config[2].message = `
          申请续约时长：<span style="color: #ff5c9d">${title}</span><br />
          申请续约时段为：<br />
          <span style="color: #ff5c9d">${formatExpirDate} - ${_tomorrow}</span>`;
      }
    },
    // 点击选择解约项
    changeTermination(row) {
      this.type = row.type;
      if (this.type === 3) {
        getExchangeMsg({
          data: {
            uid: this.$state.info.uid,
            ticket: this.$state.info.ticket
          }
        }).then(res => {
          if (res.code === 200) {
            const { bindPaymentPwd } = res.data;
            if (!bindPaymentPwd) {
              this.$dialog.confirm({
                confirmButtonColor: '#ff5c9d',
                title: '提示',
                message: '您还没有设置支付密码哦，请先到[我的]-[设置]-[支付密码]中设置支付密码'
              }).then(() => {
                this.$utils.appTools.jumpAppointPage('PAY_PWD_PAGE');
              });
            } else {
              this.pageDialog.two = true;
            }
          }
        });
      } else {
        this.pageDialog.two = true;
      }
    },
    // 二次确认
    secondaryConfirm() {
      if (this.active == -1) {
        this.$toast('请选择签约时长');
      } else if (!this.checked) {
        this.$toast('请先同意《签约须知》');
      } else {
        // if (this.info.isBindAnchor) {
        //   this.$toast('请解除与当前主播的绑定关系，再申请签约哦~');
        //   return;
        // }
        // 只有申请签约时才需要回答问题
        if (this.hanldType == 1) {
          this.pageDialog.four = true;
          return;
        }
        this.pageDialog.two = true;
      }
    },
    // 点击确定进行异步操作
    async beforeClose(action, done) {
      if (action === 'confirm') {
        let fn;
        let params = {
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket
        };
        if (this.hanldType == 1 || this.hanldType == 2) {
          fn = contractSignApply;
          params.days = this.durationList[this.active].days;
        } else {
          fn = contractRelieveApply;
          const find = this.terminationList.find(item => item.type == this.type);
          params.type = find.type;
          params.pwd = '';
          // 强制解约, 需要用户输入支付密码
          if (find.type === 3) {
            console.log('强制解约, 需要用户输入支付密码');
            done();
            this.pageDialog.one = false;
            this.showKeyboard = true;
            return;
          }
        }
        const res = await fn({ data: params });
        if (res.code === 200) {
          const data = res.data; // eslint-disable-line no-unused-vars
          if (data != undefined && Object.keys(data).length) {
            const signDate = this.$utils.formatDate(data.signTime, 'yyyy.MM.dd');
            const expireDate = this.$utils.formatDate(data.expireTime, 'yyyy.MM.dd');
            this.$nextTick(() => {
              if (this.hanldType == 1) {
                this.configTwo[this.hanldType] = {
                  title: `已申请-签约${data.days / 30}个月`,
                  message: `
                  申请签约时段为：<br />
                    <span style="color: #ff5c9d">${signDate} - ${expireDate}</span>
                    <br />
                  请耐心等待会长审核~`
                }
              } else if (this.hanldType == 2) {
                this.configTwo[2] = {
                  title: `已申请-续约${data.days / 30}个月`,
                  message: `
                    申请续约时段为：<br />
                    <span style="color: #ff5c9d">${signDate} - ${expireDate}</span>
                    <br />
                  请耐心等待会长审核~`
                }
              }
            });
          }
          done();
          this.pageDialog.one = false;
          this.pageDialog.three = true;
          // 更新详情
          this.contractMine();
        }
      } else {
        done();
      }
    },
    // 获取用户是否绑定密码
    getExchangeMsg() {
      getExchangeMsg({
        data: {
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket
        }
      }).then(res => {
        if (res.code === 200) {
          this.exchangeMsg = res.data;
        }
      });
    },
    // 获取详情
    contractMine() {
      contractMine({
        data: {
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket
        },
        isReturnResponse: true,
        isReturnError: false
      }).then(res => {
        const result = res.data;
        if (result.code === 200) {
          this.info = result.data;
        } else {
          console.log(result.message);
        }
      });
    }
  }
}
</script>

<style lang="scss" scoped>
@import './css/index.scss';
/* @import './css/iconfont.css'; */
$color: #8c8c8c;
.page-bd {
  background-color: #fff;
}
.btn-skin {
  background: linear-gradient(90deg, #FF5C9D 0%, #FFAEBF 100%);
}
.br12 {
  border-radius: px2rem(24);
}
.mod {
  font-size: 12px;
  text-align: left;
}
.section {
  position: relative;
  /deep/ {
    .app-button--primary {
      @extend .btn-skin;
    }
    .app-button--info {
      color: $color;
      background: #f5f5f5;
    }
  }
}
.signing-btn-group {
  margin-top: px2rem(40);
  .btn {
    margin-bottom: px2rem(24);

    &:last-child {
      margin-bottom: 0;
    }
  }
}
.mod-tips {
  font-size: 14px;
  color: #262626;
  margin-top: px2rem(32);
}
.duration-list {
  margin-top: px2rem(24);
  margin-bottom: px2rem(40);
  justify-content: space-between;
  .option {
    align-items: center;
    justify-content: center;
    width: px2rem(284);
    height: px2rem(72);
    font-size: 14px;
    color: $color;
    border-radius: px2rem(40);
    border: 1px solid #e9e9e9;
    background: #f5f5f5;
    &.checked {
      color: #fff;
      border: none;
      @extend .btn-skin;
    }
  }
}
.termination-list {
  padding-top: px2rem(24);
  .option {
    align-items: center;
    justify-content: center;
    font-size: 14px;
    color: #ff5c9d;
    width: 100%;
    margin-bottom: px2rem(24);
    text-align: center;
    height: px2rem(112);
    border-radius: px2rem(24);
    border: 1px solid #ff5c9d;
  }
}
.setup {
  background-color: #fff;
  .item {
    align-items: center;
    font-size: 14px;
    min-height: px2rem(100);
    padding: 0 px2rem(30);
    .bd {
      flex: 1;
      overflow: hidden;
      padding-left: 20px;
      color: $color;
      text-align: right;
    }
  }
}
.statusTips {
  &-0 {
    color: #ff0f3a;
  }
  &-1 {
    color: #ff870f;
  }
  &-2 {
    color: #5d92ff;
  }
  &-5 {
    color: #ff870f;
  }
}
.btn-group {
  padding: 0 px2rem(32);
  margin-top: px2rem(200);
  .btn {
    margin-bottom: px2rem(32);
    @extend .btn-skin;
  }
  .plain {
    color: #ff5c9d;
    border: 1px solid #ff5c9d;
    background: #fff;
  }
}
.form {
  text-align: left;
  padding-top: px2rem(56);
  padding-bottom: px2rem(40);
  &-element {
    margin-bottom: 12px;
  }
  h4 {
    margin-bottom: 12px;
  }
  label {
    font-size: 13px;
  }
}
input[type="checkbox"],
input[type="radio"] {
  position: relative;
  appearance: none;
  display: inline-block;
  width: 16px;
  height: 16px;
  margin-right: 8px;
  border-radius: 50%;
  vertical-align: middle;
  border: solid 2px #bfbfbf;
  background-clip: padding-box;
  background-color: #fff;
  &:focus {
    outline: 0 none;
    outline-offset: -2px;
  }
  &:checked {
    border: none;
    background-image: url(./assets/ic_selected@2x.png);
    background-repeat: no-repeat;
    background-size: 100%;
    /* background-color: #ff5c9d; */
    /* &::before {
      display: inline-block;
      font-family: iconfont;
      content: "\e67e";
      margin-left: 2px;
      margin-top: 1px;
      color: #fff;
      font-size: 14px;
    } */
  }
}
</style>