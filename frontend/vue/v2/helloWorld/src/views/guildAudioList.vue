<template>
  <div class="page">
    <header-bar title="公告列表">
      <template #right>
        <template v-if="position === 0 || position === 2">
          <router-link :to="{ path: '/guildAudioAdd' }" style="color: #427FFF;font-size: 12px;">发公告</router-link>
        </template>
      </template>
    </header-bar>
    <div class="page-bd">
      <router-link
        tag="div"
        class="book flex"
        to="/guildRule/guildService">
        点击查看《公会运营承诺书》
        <icon-arrow fill="#5d92ff" />
      </router-link>
      <van-list
        :offset="10"
        :immediate-check="false"
        v-model="loading"
        :finished="finished"
        @load="onLoad">
        <div class="mod audio-mod">
          <ul class="audio" v-if="list.length">
            <van-swipe-cell
              :disabled="position !== 0"
              :before-close="beforeClose(item, index)"
              v-for="(item, index) in list"
              :key="index">
              <li class="audio-item">
                <div class="bd">
                  <p v-html="$utils.toHalf(item.announce)"></p>
                </div>
                <div class="ft flex a-i-c">
                  <div class="author flex a-i-c">
                    <img :src="item.user.avatar" alt="">
                    <span class="ellipsis">{{ item.user.nick }}</span>
                  </div>
                  <div class="audio-time">
                    <time>{{ item.createTime | formatDate }}</time>
                  </div>
                </div>
              </li>
              <template #right>
                <van-button square type="danger" text="删除" style="height: 100%;" />
              </template>
            </van-swipe-cell>
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
import { HeaderBar, BaseEmpty, IconArrow } from '@/components';
import { guildAnnounceList, guildAnnounceDel } from '@/api/guild';

export default {
  name: 'GuildAudioList',
  components: {
    HeaderBar,
    BaseEmpty,
    IconArrow
  },
  data() {
    return {
      loading: false,
      finished: false,
      position: this.$state.guild.position, // 角色
      query: {
        guildId: this.$state.guild.guildId, // 公会主键ID
        uid: this.$state.info.uid,
        pageNum: 1,
        pageSize: 10
      },
      list: [] // 数据列表
    };
  },
  created() {
    this.getData();
  },
  methods: {
    beforeClose(params = {}, index) {
      return ({ position, instance }) => {
        switch (position) {
          case 'right':
            this.handleDel(params.id, index, instance);
            break;
        }
      }
    },
    // 执行删除操作
    handleDel(announceId, index, instance) {
      let params = {
        announceId,
        guildId: this.$state.guild.guildId,
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      }
      guildAnnounceDel({ data: params, loading: { show: true }}).then(res => {
        if (res.code === 200) {
          instance.close();
          this.loading = true;
          this.finished = false;
          this.query.pageNum = 1;
          this.list = [];
          this.getData();
          // this.list.splice(index, 1);
        } else {
          this.$toast(res.message);
        }
      });
    },
    onLoad() {
      this.query.pageNum++;
      this.getData();
    },
    // 获取数据
    getData() {
      guildAnnounceList({ data: this.query }).then(res => {
        if (res.code === 200) {
          this.loading = false;
          if (res.data.length) {
            this.list = this.list.concat(res.data);
          } else {
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
.book {
  color: #5d92ff;
  height: px2rem(88);
  font-size: 14px;
  padding: 0 px2rem(32);
  align-items: center;
  justify-content: space-between;
  background-color: #edf3ff;
}
.audio {
  &-item {
    font-size: 14px;
    padding: px2rem(30);
    margin-bottom: 6px;
    background-color: #fff;
    .bd {
      p {
        line-height: 20px;
        margin-bottom: 10px;
      }
    }
    .ft {
      font-size: 13px;
      color: #8c8c8c;
      justify-content: space-between;
    }
  }
  .author {
    img {
      width: px2rem(48);
      height: px2rem(48);
      border-radius: 50%;
      margin-right: 8px;
    }
    span {
      display: inline-block;
      max-width: 100px;
    }
  }
}
</style>