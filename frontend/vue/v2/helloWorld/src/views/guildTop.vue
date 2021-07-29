<template>
  <div class="page">
    <header-bar title="公会榜单"></header-bar>
    <div class="page-bd">
      <dialogs
        title="提示"
        :show-dialog.sync="showDialog">
        <div class="guild_message settingMargin">
          <p>{{ description }}</p>
        </div>
      </dialogs>
      <!-- 搜索 -->
      <div class="mod">
        <div class="search">
          <form action="" class="form" @submit.prevent="onSubmit">
            <div class="form-item">
              <input
                type="search"
                class="input"
                v-model.trim="query.text"
                autocomplete="off"
                placeholder="搜索公会名称/ID"
                maxlength="15" />
            </div>
          </form>
        </div>
      </div>
      <van-list
        :offset="10"
        :immediate-check="false"
        v-model="loading"
        :finished="finished"
        @load="onLoad">
        <div class="mod mh-240">
          <ul class="list" v-if="list.length">
            <li class="item flex" @click="jump(item)" v-for="item in list" :key="item.id">
              <div class="hd">
                <template v-if="item.ranking == 1">
                  <img src="../assets/sociaty-1.png" alt="" width="22" height="22" />
                </template>
                <template v-else-if="item.ranking == 2">
                  <img src="../assets/sociaty-2.png" alt="" width="22" height="22" />
                </template>
                <template v-else-if="item.ranking == 3">
                  <img src="../assets/sociaty-3.png" alt="" width="22" height="22" />
                </template>
                <template v-else>
                  <b class="din-bold">{{ item.ranking > 10 ? '' : item.ranking }}</b>
                </template>
              </div>
              <div class="bd flex">
                <div class="avatar">
                  <img :src="item.icon" alt="" class="pic">
                </div>
                <div class="guild-info">
                  <h3 class="name h3 flex">
                    <span class="text-ellipsis">{{ item.name }}</span>
                    <img :src="item.levelInfo.url" alt="" class="level">
                    <!-- 保单标识 -->
                    <img
                      v-if="item.isSettingMargin"
                      src="../assets/ic_society-bao.png"
                      alt=""
                      class="isSettingMargin"
                      width="22"
                      height="22"
                      @click.stop="marginHandle('isSettingMargin')"
                    />
                    <!-- 优质标识 -->
                    <img
                      v-if="item.isSettingHighQuality"
                      src="../assets/ic_society_you.png"
                      alt=""
                      class="isSettingHighQuality"
                      width="22"
                      height="22"
                      @click.stop="marginHandle('isSettingHighQuality')"
                    />
                  </h3>
                  <div class="people flex">
                    <svg width="16px" height="16px" viewBox="0 0 16 16">
                      <path d="M10.9046939,5.34746032 C10.9046939,6.84430858 9.69121369,8.05780126 8.19427838,8.05780126 C6.6974923,8.05780126 5.48403694,6.8443832 5.48403694,5.34746032 C5.48403694,3.85061206 6.69752962,2.63710695 8.19427838,2.63710695 C9.69122613,2.63710695 10.9046939,3.850525 10.9046939,5.34746032 Z M8.19424106,13.8791832 C6.03971634,13.8791832 4.29290625,13.6241843 4.29290625,11.7645942 C4.29290625,9.90511596 6.03969147,8.39759662 8.19441519,8.39759662 C10.3490892,8.39759662 12.09575,9.9050289 12.09575,11.7644201 C12.09575,13.6239978 10.3489399,13.8791832 8.19424106,13.8791832 Z" fill="#8c8c8c"></path>
                    </svg>
                    <span class="din-bold">{{ item.contractMemberCount }}</span>
                  </div>
                  <p class="desc text-ellipsis">{{ item.declaration }}</p>
                </div>
              </div>
              <div class="ft">
                <span class="din-bold">贡献值：{{ $utils.dealScore(item.amount) }}</span>
              </div>
            </li>
          </ul>
          <template v-else>
            <base-empty title="暂无数据"></base-empty>
          </template>
        </div>
      </van-list>
    </div>
  </div>
</template>
<script>
import { HeaderBar, BaseEmpty, Dialogs } from '@/components';
import settingMixin from '@/mixin/setting';
import { guildRankTotal } from '@/api/guild';

export default {
  name: 'GuildTop',
  mixins: [settingMixin],
  components: {
    HeaderBar,
    BaseEmpty,
    Dialogs
  },
  data() {
    return {
      loading: false,
      finished: false,
      timeout: null,
      query: {
        text: '',
        pageNum: 1,
        pageSize: 300
      },
      list: [] // 数据列表
    };
  },
  created() {
    this.getData();
  },
  methods: {
    onSubmit() {
      console.log('onSubmit');
      this.query.pageNum = 1;
      this.getData(true);
      return false;
    },
    // 查看公会名片
    jump(params = {}) {
      // 跳转到我的公会
      let { guildId, applyJoinStatus } = this.$state.guild;
      if (params.id === guildId && applyJoinStatus === 2) {
        this.$router.push({ path: '/guildMe' });
      } else {
        this.$router.push({ path: '/guildCard', query: { guildId: params.id }});
      }
    },
    onLoad() {
      this.finished = true;
    },
    // 获取列表数据
    getData(isSearch = false) {
      guildRankTotal({ data: this.query, loading: { show: true }}).then(res => {
        if (res.code === 200) {
          this.loading = false;
          if (res.data.length) {
            // 不是搜索触发的
            if (!isSearch) {
              // this.list = this.list.concat(res.data);
              this.list = res.data.slice(0, 10);
            } else {
              if (this.query.text == '') {
                this.list = res.data.slice(0, 10);
              } else {
                // 不限制搜索出来的数据
                this.list = res.data;
              }
            }
          } else {
            this.list = [];
            this.finished = true;
          }
        }
      });
    }
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.hairline--bottom::after {
  border-bottom-width: 1px !important;
}
input[type="search"]::-webkit-search-cancel-button{
  display: none;
}
.search {
  padding: px2rem(8) px2rem(24);
  background-color: #fff;
  input {
    padding-left: px2rem(72);
    border-radius: px2rem(36);
    background-color: #f5f5f5;
    background-image: url('./assets/ic-search.png');
    background-repeat: no-repeat;
    background-position: 8px center;
    appearance: none;
  }
}
.mh-240 {
  min-height: 240px;;
}
.mod {
  position: relative;
}
.list {
  background-color: #fff;
  .item {
    font-size: 12px;
    height: px2rem(160);
    align-items: center;
    margin: 0 px2rem(30) 0 8px;
    position: relative;
    &::after {
      position: absolute;
      content: ' ';
      top: -50%;
      right: -50%;
      bottom: -50%;
      left: -50%;
      pointer-events: none;
      border: 0 solid #ebedf0;
      transform: scale(0.5);
    }
    &:active {
      background-color: #f2f2f2;
    }
    .hd {
      width: 30px;
      font-size: 16px;
      text-align: center;
    }
    .bd {
      flex: 1;
      overflow: hidden;
      align-items: center;
    }
    .ft {
      position: absolute;
      right: 0;
      top: 50%;
      z-index: 10;
      transform: translateY(-50%);
    }
    .name {
      font-size: 16px;
      align-items: center;

      span {
        display: inline-block;
        margin-right: 4px;
        max-width: px2rem(180);
      }
    }
    .level {
      height: 28px;
      object-fit: cover;
      margin-right: 4px;
    }
    .guild-info {
      flex: 1;
      overflow: hidden;
      align-self: flex-start;
    }
    .avatar {
      padding-left: px2rem(10);
      padding-right: px2rem(20);
      border-radius: px2rem(16);
    }
    .people {
      color: #8c8c8c;
      margin-bottom: 4px;
      align-items: center;
    }
    .pic {
      width: px2rem(112);
      height: px2rem(112);
      border-radius: px2rem(16);
      object-fit: cover;
    }
    .desc {
      color: #8c8c8c;
    }
  }
}
</style>