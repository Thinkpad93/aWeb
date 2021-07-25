export const codeConfig = {
  30001: {
    title: '提示',
    message: '需要绑定手机号，才可加入公会~',
    confirmButtonText: '去绑定手机',
    cancelButtonText: '取消',
    showConfirmButton: true,
    showCancelButton: true,
    beforeClose(action, done) {
      if (action === 'confirm') {
        this.$utils.appTools.jumpAppointPage('PHONE_NUM_PAGE');
      }
      done();
    }
  },
  10108: {
    title: '提示',
    message: '需要完成实名认证，才可加入公会~',
    confirmButtonText: '前往实名',
    cancelButtonText: '取消',
    showConfirmButton: true,
    showCancelButton: true,
    beforeClose(action, done) {
      if (action === 'confirm') {
        this.$utils.appTools.jumpAppointPage(
          'H5_PAGE',
          `${location.origin}/h5/modules/project/index.html#/identityNew`
        );
      }
      done();
    }
  },
  10114: {
    title: '提示',
    message: '实名需满18周岁，才可签约公会~',
    confirmButtonText: '我知道了',
    cancelButtonText: '',
    showConfirmButton: true,
    showCancelButton: false,
    beforeClose(action, done) {
      done();
    }
  },
  60015: {
    title: '提示',
    message: '同一实名的所有账号只能加入同一个公会哦~',
    confirmButtonText: '我知道了',
    cancelButtonText: '',
    showConfirmButton: true,
    showCancelButton: false,
    beforeClose(action, done) {
      done();
    }
  },
  1: {
    title: '提示',
    message: '您已有在申请的公会，是否取消其申请，改为申请加入当前公会',
    confirmButtonText: '确认',
    cancelButtonText: '取消',
    showConfirmButton: true,
    showCancelButton: true,
    beforeClose(action, done) {
      if (action === 'confirm') {
        this.userAddJoin(this.query);
      }
      done();
    }
  },
  2: {
    title: '提示',
    message: '您已有公会，需退出所在公会才能申请加入该公会',
    confirmButtonText: '我知道了',
    cancelButtonText: '',
    showConfirmButton: true,
    showCancelButton: false,
    beforeClose(action, done) {
      done();
    }
  },
  // 自定义状态码
  6008: {
    title: '提示',
    message:
      '您的实名认证信息下其他账号中，已有在申请的公会，是否取消其申请，改为申请加入当前公会',
    confirmButtonText: '确认',
    cancelButtonText: '取消',
    showConfirmButton: true,
    showCancelButton: true,
    beforeClose(action, done) {
      if (action === 'confirm') {
        this.userAddJoin(this.query);
      }
      done();
    }
  },
  60009: {
    title: '提示',
    message: '公会成员已存在',
    confirmButtonText: '我知道了',
    cancelButtonText: '',
    showConfirmButton: true,
    showCancelButton: false,
    beforeClose(action, done) {
      done();
    }
  },
  60012: {
    title: '提示',
    message: '公开厅无法申请加入公会，如有疑问请联系运营',
    confirmButtonText: '我知道了',
    cancelButtonText: '',
    showConfirmButton: true,
    showCancelButton: false,
    beforeClose(action, done) {
      done();
    }
  },
  200: {
    title: '提示',
    message: '已成功发送入会申请，请耐心等待会长审核~',
    confirmButtonText: '我知道了',
    cancelButtonText: '',
    showConfirmButton: true,
    showCancelButton: false,
    beforeClose(action, done) {
      done();
    }
  }
};
