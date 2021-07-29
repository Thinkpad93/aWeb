import request from '@/utils/request';

// 查询申请状态
export function applyStatus(option = {}) {
  option.url = '/guild/apply/status';
  return request.post(option);
}

// 公告列表
export function guildAnnounceList(option = {}) {
  option.url = '/guild/announce/list';
  return request.get(option);
}

// 添加公告
export function guildAnnounceAdd(option = {}) {
  option.url = '/guild/announce/add';
  return request.post(option);
}

// 删除公告
export function guildAnnounceDel(option = {}) {
  option.url = '/guild/announce/del';
  return request.post(option);
}

// 更新公会信息
export function guildEdit(option = {}) {
  option.url = '/guild/edit';
  return request.post(option);
}

// 公会信息-公会名片页面调用
export function guildDetail(option = {}) {
  option.url = '/guild/detail';
  return request.get(option);
}

// 我的公会-我的公会页面调用
export function guildMine(option = {}) {
  option.url = '/guild/mine';
  return request.get(option);
}

// 公会房间列表
export function guildRoomList(option = {}) {
  option.url = '/guild/room/list';
  return request.get(option);
}

// 公会总榜
export function guildRankTotal(option = {}) {
  option.url = '/guild/rank/total';
  return request.post(option);
}

// 公会成员贡献总榜
export function guildRankMemberTotal(option = {}) {
  option.url = '/guild/rank/member/total';
  return request.post(option);
}

// 公会成员贡献日榜
export function guildRankMemberDay(option = {}) {
  option.url = '/guild/rank/member/day';
  return request.post(option);
}

// 捐献积分
export function guildIntegralContribute(option = {}) {
  option.url = '/guild/integral/contribute';
  return request.post(option);
}

// 上报积分
export function guildIntegralUp(option = {}) {
  option.url = '/guild/integral/up';
  return request.post(option);
}

// 会长入会审批列表
export function guildApplyList(option = {}) {
  option.url = '/guild/apply/list';
  return request.get(option);
}

// 会长入会审批
export function guildApplyDealApplyIn(option = {}) {
  option.url = '/guild/apply/dealApplyIn';
  return request.post(option);
}

// 会长退会审批
export function guildApplyDealApplyOut(option = {}) {
  option.url = '/guild/apply/dealApplyOut';
  return request.post(option);
}

// 成员取消退会
export function guildApplyCancelQuit(option = {}) {
  option.url = '/guild/apply/cancelQuit';
  return request.post(option);
}

// 成员申请退会
export function guildApplyQuit(option = {}) {
  option.url = '/guild/apply/quit';
  return request.post(option);
}

// 成员申请入会
export function guildApplyAdd(option = {}) {
  option.url = '/guild/apply/add';
  return request.post(option);
}

// 开除成员
export function guildMemberExpel(option = {}) {
  option.url = '/guild/member/expel';
  return request.post(option);
}

// 加入群聊
export function addChat(option = {}) {
  option.url = '/guild/member/add/chat';
  return request.post(option);
}

// 移除群聊
export function removeChat(option = {}) {
  option.url = '/guild/member/remove/chat';
  return request.post(option);
}

// 公会等级
export function guildLevel(option = {}) {
  option.url = '/guild/level';
  return request.get(option);
}

// 公会搜索
export function guildSearch(option = {}) {
  option.url = '/guild/rank/search';
  return request.get(option);
}

/* 2021-03-07 14:40 */

// 删除管理员
export function guildRemoveAdmin(option = {}) {
  option.url = '/guild/apply/removeAdmin';
  return request.post(option);
}

// 添加管理员
export function guildAddAdmin(option = {}) {
  option.url = '/guild/apply/addAdmin';
  return request.post(option);
}

// 公会签到
export function guildSign(option = {}) {
  option.url = '/guild/sign';
  return request.post(option);
}

// 是否正在申请开通公会
export function guildIsOpen(option = {}) {
  option.url = '/guild/apply/isOpen';
  return request.get(option);
}

// 申请开通公会
export function guildOpen(option = {}) {
  option.url = '/guild/apply/open';
  return request.post(option);
}

/* 公会2.0 */
// 签约成员列表
export function contractMemberList(option = {}) {
  option.url = '/guild/contract/member/list';
  return request.get(option);
}

// 审批列表
export function contractApproveList(option = {}) {
  option.url = '/guild/contract/approve/list';
  return request.get(option);
}

// 审批 签约/解约
export function contractApprove(option = {}) {
  option.url = '/guild/contract/approve';
  return request.post(option);
}

// 解约申请
export function contractRelieveApply(option = {}) {
  option.url = '/guild/contract/relieve/apply';
  return request.post(option);
}

// 提前解约
export function contractAdvanceRelieve(option = {}) {
  option.url = '/guild/contract/advance/relieve';
  return request.post(option);
}

// 申请签约/续约
export function contractSignApply(option = {}) {
  option.url = '/guild/contract/sign/apply';
  return request.post(option);
}

// 我的签约详情
export function contractMine(option = {}) {
  option.url = '/guild/contract/mine';
  return request.get(option);
}

// 获取用户支付宝绑定、钻石数、金币数
export function getExchangeMsg(option = {}) {
  option.url = '/withDraw/exchange/msg';
  return request.get(option);
}

// 是否申请加入公会中
export function guildHasApplyJoin(option = {}) {
  option.url = '/guild/apply/hasApplyJoin';
  return request.get(option);
}

// 2021-05-26
// 流水汇总
export function recordSummary(option = {}) {
  option.url = '/room/serial/record/summary';
  return request.get(option);
}

// 公会流水统计
export function recordGuildTotal(option = {}) {
  option.url = '/room/serial/record/guildTotal';
  return request.get(option);
}

// 公会流水列表
export function recordGuildSerials(option = {}) {
  option.url = '/room/serial/record/guildSerials';
  return request.get(option);
}

// 公会流水明细
export function recordGuildSerialDetails(option = {}) {
  option.url = '/room/serial/record/guildSerialDetails';
  return request.get(option);
}

// 公会用户汇总
export function guildUserTotal(option = {}) {
  option.url = '/room/serial/record/guildUserTotal';
  return request.get(option);
}

// 房间流水列表
export function recordRoomSerials(option = {}) {
  option.url = '/room/serial/record/roomSerials';
  return request.get(option);
}

// 房间流水汇总
export function recordRoomTotal(option = {}) {
  option.url = '/room/serial/record/roomTotal';
  return request.get(option);
}

// 房间用户流水列表
export function recordRoomUserSerials(option = {}) {
  option.url = '/room/serial/record/roomUserSerials';
  return request.get(option);
}

// 房间流水明细
export function recordRoomSerialDetails(option = {}) {
  option.url = '/room/serial/record/roomSerialDetails';
  return request.get(option);
}

// 房间用户汇总
export function recordRoomUserTotal(option = {}) {
  option.url = '/room/serial/record/roomUserTotal';
  return request.get(option);
}