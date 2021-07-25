<template>
  <div class="page">
    <header-bar title="设置公会信息">
      <template #right>
        <span style="color: #427FFF;" @click="save">发布</span>
      </template>
    </header-bar>
    <div class="page-bd">
      <form class="form">
        <template v-if="source == 'declaration'">
          <div class="form-item">
            <div class="field-body flex a-i-c">
              <input type="input" class="input" placeholder="请输公会宣言" maxlength="15" v-model.trim="form.declaration" />
              <div class="field-right" v-if="0">
                <img src="./assets/ic-close.png" alt="">
              </div>
            </div>
          </div>
          <div class="word-limit"><span class="word-num">{{ form.declaration.length }}</span>/15</div>
        </template>
        <template v-else>
          <div class="form-item">
            <textarea class="textarea" rows="12" placeholder="请输入公会简介" v-model.trim="form.introduction" maxlength="1000"></textarea>
          </div>
          <div class="word-limit"><span class="word-num">{{ form.introduction.length }}</span>/1000</div>
        </template>
      </form>
    </div>
  </div>
</template>
<script>
import { textReplace, brReplace } from '@/utils';
import { HeaderBar } from '@/components';
import { guildDetail, guildEdit } from '@/api/guild';

export default {
  name: 'GuildSlogan',
  components: {
    HeaderBar
  },
  data() {
    return {
      source: this.$route.query.type,
      query: {
        guildId: this.$state.guild.guildId,
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      },
      form: {
        declaration: '', // 公会宣言
        introduction: '' // 公会简介
      }
    };
  },
  created() {
    this.getInfo();
  },
  methods: {
    // 保存操作
    save() {
      let form = document.forms[0];
      if (form.length) {
        let element = form.elements[0];
        if (element.value == '') {
          this.$toast('请填写信息');
        } else {
          this.upDateGuildInfo();
          console.log('通过');
        }
      }
    },
    // 获取公会信息
    getInfo() {
      guildDetail({ data: this.query }).then(res => {
        if (res.code === 200) {
          this.form.declaration = res.data.declaration || '';
          this.form.introduction = brReplace(this.$utils.toHalf(res.data.introduction)) || '';
        }
      });
    },
    // 更新公会信息
    upDateGuildInfo() {
      let { declaration, introduction } = this.form; // eslint-disable-line no-unused-vars
      introduction = textReplace(introduction) || '';
      let params = Object.assign({}, this.query, { declaration, introduction });
      guildEdit({ data: params }).then(res => {
        if (res.code === 200) {
          this.$toast('公会信息更新成功');
          // 返回上一级
          this.$router.back();
        }
      });
    }
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.form {
  &-item {
    background-color: #fff;
  }
  .field-body {
    padding: 0 px2rem(30);
  }
  .input {
    height: px2rem(100);
    border: none;
  }
}
.word-limit {
  color: #8c8c8c;
  text-align: right;
  padding: px2rem(30);
}
.textarea {
  border: none;
}
</style>