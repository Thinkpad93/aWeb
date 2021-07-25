export default {
  data() {
    return {
      showDialog: false,
      description: ''
    };
  },
  methods: {
    marginHandle(strContent) {
      if (strContent === 'isSettingMargin') {
        this.description =
          '此标志证明此【公会】已向平台，按照【每个厅】交纳5000元保证金，作为主播档费保证金的【认证】标志，证明其公会有实力保证主播收益安全。';
      } else {
        this.description = '此标志代表官方认证【优质】公会';
      }
      this.showDialog = true;
    }
  }
};
