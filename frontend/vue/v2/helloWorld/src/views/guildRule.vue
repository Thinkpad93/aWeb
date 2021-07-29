<template>
  <div class="page">
    <header-bar :title="title"></header-bar>
    <div class="page-bd">
      <div class="rule-container">
        <div v-html="content"></div>
      </div>
    </div>
  </div>
</template>

<script>
// import { ALIAS } from '@/utils/config';
import { HeaderBar } from '@/components';
export default {
  name: 'GuildContractRule',
  components: {
    HeaderBar
  },
  props: {
    type: String
  },
  data() {
    return {
      title: '',
      content: ''
    }
  },
  created() {
    this.getRule();
  },
  methods: {
    getRule() {
      if (this.type) {
        console.log(this.type);
        this.$request.get({
          url: `/h5/modules/rules/${this.type}.json`,
          isReturnResult: true,
          isIgnoreLog: true,
          config: {
            baseURL: ''
          }
        }).then(({ title, content }) => {
          let info;
          let platform = this.$route.query.platform
          if (this.$utils.os.app) {
            info = ALIAS[this.$utils.os.appName];
          } else {
            info = platform ? ALIAS[platform] : ALIAS[this.$utils.os.appName];
          }
          if (title) {
            for (const key in info) {
              title = title.replace(new RegExp(`{{[ \t]*${key}[ \t]*}}`, 'g'), info[key]);
            }
            this.title = title
          }
          if (content) {
            for (const key in info) {
              content = content.replace(new RegExp(`{{[ \t]*${key}[ \t]*}}`, 'g'), info[key]);
            }
            this.content = content;
          }
        })
      }
    }
  }
}
</script>

<style lang="scss">
@import './css/index.scss';
@mixin result_two {
  box-sizing: border-box;
  content: ' ';
  position: absolute;
  bottom: -50%;
  right: -50%;
  left: -50%;
  top: -50%;
  pointer-events: none;
  border: 0px solid #ebedf0;
  transform: scale(0.5);
}
.rule-container {
  padding: 15px;
  line-height: 20px;
  font-size: 14px;
  color: #262626;
  text-align: justify;

  .whole-title {
    font-size: 15px;
    margin-bottom: 10px;
    font-weight: bold;
  }

  .bold {
    font-weight: bold;
  }
  .table {
    position: relative;
    font-size: 14px;
    margin-top: 8px;
    margin-bottom: 8px;
    text-align: center;
    &::after {
      @include result_two;
      border-top-width: 2px;
      z-index: 1;
    }
    .tr {
      width: 100%;
      align-items: center;
      background-color: #fff;
    }
    .th {
      position: relative;
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #8c8c8c;
      height: px2rem(72);
      &::before {
        @include result_two;
        border-width: 0 1px 1px 0;
      }
    }
    .td {
      position: relative;
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      height: px2rem(104);
      &::before {
        @include result_two;
        border-width: 0 1px 1px 0;
      }
    }
    .w180 {
      flex: none;
      width: px2rem(360);
    }
  }
  h4 {
    font-size: 14px;
    margin-bottom: 10px;
  }
  ul {
    margin-bottom: 10px;
  }

  p {
    margin-bottom: 10px;
    word-wrap: break-word;
    word-break: normal;
  }

}
</style>
