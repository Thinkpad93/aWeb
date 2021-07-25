<template>
  <div class="page">
    <header-bar title="公会信息"></header-bar>
    <div class="page-bd">
      <div class="mod card-mod">
        <div class="card flex">
          <div class="card-hd">
            <img :src="guildInfo.icon" alt="">
          </div>
          <div class="card-bd">
            <h3 class="name text-ellipsis">{{ guildInfo.name }}</h3>
            <div class="metadata flex">
              <div class="ids flex a-i-c">
                <svg width="16px" height="16px" viewBox="0 0 16 16">
                  <path d="M12.356162,2.2 C13.1418763,2.2 13.7847334,2.85 13.7847334,3.64444444 L13.7847334,3.64444444 L13.7200247,13.206959 C13.716374,13.746441 13.2927212,14.0462927 12.7739051,13.8566852 L12.7739051,13.8566852 L7.7847334,12.0333333 L3.14583671,13.8373487 C2.63206749,14.0371479 2.2163134,13.7554004 2.22002465,13.206959 L2.22002465,13.206959 L2.2847334,3.64444444 C2.2847334,2.85 2.92759054,2.2 3.71330483,2.2 L3.71330483,2.2 Z M5.87916899,4.36256268 L4.90891362,4.36256268 L4.90891362,10.2836083 L5.87916899,10.2836083 L5.87916899,4.36256268 Z M9.06159526,4.36256268 L6.89717943,4.36256268 L6.89717943,10.2836083 L9.06159526,10.2836083 C10.0235579,10.2836083 10.7450298,10.0182393 11.2425967,9.48750132 C11.7152852,8.98164168 11.9557758,8.26016974 11.9557758,7.32308549 C11.9557758,6.37770846 11.7152852,5.65623651 11.2425967,5.15866965 C10.7450298,4.62793167 10.0235579,4.36256268 9.06159526,4.36256268 Z M8.87915408,5.19184078 C9.61721159,5.19184078 10.1562424,5.3576964 10.4962464,5.69770042 C10.8279576,6.02941166 10.9938132,6.5767352 10.9938132,7.32308549 C10.9938132,8.05285021 10.8279576,8.59188098 10.4962464,8.94017778 C10.1562424,9.2801818 9.61721159,9.4543302 8.87915408,9.4543302 L7.8674348,9.4543302 L7.8674348,5.19184078 L8.87915408,5.19184078 Z" fill="#ccc"></path>
                </svg>
                <span class="id" style="margin-left: 2px;">{{ guildInfo.guildBizId }}</span>
              </div>
              <div class="copy flex a-i-c">
                <img src="../assets/ic-copy.png" alt="" width="16" height="16">
                <span @click="clipboardToPhone" style="margin-left: 2px;">点击复制ID</span>
              </div>
            </div>
            <time>创建时间: {{ guildInfo.createTime | formatDate }}</time>
          </div>
        </div>
      </div>
      <!-- 公会会长 -->
      <div class="mod" style="margin: 8px 0;">
        <div class="guild flex" @click="handlePersonPage">
          <h3 class="guild-admin">公会会长</h3>
          <div class="guild-info flex" v-if="guildInfo.levelInfo">
            <img :src="guildInfo.leaderInfo.avatar" alt="" class="avatar">
            <span class="name">{{ guildInfo.leaderInfo.nick }}</span>
            <icon-arrow fill="#ccc" />
          </div>
        </div>
      </div>
      <!-- 公会简介 -->
      <div class="mod">
        <div class="introduce">
          <h3 class="introduce-title">公会简介</h3>
          <p v-html="$utils.toHalf(guildInfo.introduction)"></p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { HeaderBar, IconArrow } from '@/components';
import { guildDetail } from '@/api/guild';

export default {
  name: 'GuildInfo',
  components: {
    HeaderBar,
    IconArrow
  },
  data() {
    return {
      guildInfo: {}
    };
  },
  mounted() {
    this.getGuildDetail();
  },
  methods: {
    // 复制方法
    clipboardToPhone() {
      if (this.$utils.os.ios) {
        this.$toast('复制成功');
      }
      this.$utils.appTools.clipboardToPhone(this.guildInfo.guildBizId.toString());
    },
    // 打开个人中心
    handlePersonPage() {
      return this.$utils.appTools.jumpAppointPage('PERSON_PAGE', this.guildInfo.leaderInfo.uid);
    },
    getGuildDetail() {
      guildDetail({
        data: {
          guildId: this.$route.query.guildId || this.$state.guild.guildId,
          uid: this.$state.info.uid
        }
      }).then(res => {
        if (res.code === 200) {
          this.guildInfo = res.data;
        }
      });
    }
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.mod {
  background-color: #fff;
  &-title {
    font-size: 16px;
    font-weight: bold;
  }
}
.card {
  align-items: center;
  height: px2rem(204);
  padding: 0 px2rem(30);
  &-hd {
    margin-right: px2rem(20);
    img {
      width: px2rem(140);
      height: px2rem(140);
      border-radius: px2rem(16);
    }
  }
  &-bd {
    flex: 1;
    font-size: 13px;
    color: #8c8c8c;
  }
  .name {
    color: #262626;
    font-size: 16px;
  }
  .metadata {
    margin: 6px 0;
    .ids {
      margin-right: 16px;
    }
  }
}
.guild {
  align-items: center;
  height: px2rem(100);
  padding: 0 px2rem(30);
  &-admin {
    font-size: 16px;
    flex: 1;
  }
  &-info {
    align-items: center;
    .name {
      font-size: 13px;
      margin: 0 8px;
    }
    .avatar {
      width: px2rem(52);
      height: px2rem(52);
      border-radius: 50%;
    }
  }
}
.introduce {
  padding: 0 px2rem(30) px2rem(30) px2rem(30);
  &-title {
    padding: 12px 0;
    font-size: 16px;
  }
  p {
    text-align: left;
    font-size: 14px;
    line-height: 1.4;
    margin-bottom: 10px;
  }
}
</style>
