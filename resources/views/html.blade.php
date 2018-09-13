<div style="font-family: 'hiragino sans gb', 'Microsoft YaHei'; color: #4b4b4b; font-size:16px;">
    <div style="font-size: 14px; line-height: 28px;">{%link_name%} 你好：</div>
    <div style="font-size: 14px; line-height: 28px; text-indent:2em; padding-bottom:30px;">
        贵公司与斗米合作的需求单：{%start_at%}至{%end_at%}的招聘服务具体如下，请查看后进行确认。<br/>
        确认地址：<a href="{%push_link_url%}" target="_blank">{%push_link_url%}</a><br>
        确认操作码：{%op_password%}<br/>请在及时完成操作，48小时后将失效!
    </div>
    <hr>
    <h2 style="font-size: 18px; font-weight: 700; line-height: 30px; text-align: center; padding-top: 50px;">
        招聘需求确认书
    </h2>
    <div style="font-size: 16px; line-height: 28px;">
        <table width="1000px" align="center" style="font-size: 16px; font-family: 'hiragino sans gb', 'Microsoft YaHei';">
            <tbody>
            <tr width="100%">
                <td >
                    <!-- 商家信息 -->
                    <table width="100%" align="center">
                        <tbody>
                        <tr>
                            <td width="50%">甲方(客户)：{%company_name%}</td>
                            <td>乙方：{%b_company_name%}</td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 15px">对应合同：{%contract_no%}</td>
                            <td>合同类型：{%contract_type_str%}</td>
                        </tr>
                        <tr>
                            <td>合同状态：{%contract_status%}</td>
                            <td>合同有效期：{%contract_start_at%} 至 {%contract_end_at%}</td>
                        </tr>
                        {{--{%contract_info%}--}}
                        <tr>
                            <td>服务期限：{%start_at%} 至 {%end_at%}</td>
                            <td>&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <!-- 职位信息 -->
                    <table width="100%" align="center" style="padding-top: 20px; border-top: 1px solid #ddd; margin-top: 20px;">
                        <tbody>
                        <tr>
                            <td><h4>岗位信息</h4></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px dashed #ddd;">
                                <table class="table table-striped">
                                    <tbody><div style="display: none"><i class="fa fa-fw fa-info-circle" style="color:#bce8f1"></i>生效后新增的城市或岗位，标蓝展示</div><tr><th align="right">岗位ID</th><td style="padding-left: 20px;">1113</td></tr><tr><th align="right">岗位名称</th><td style="padding-left: 20px;">岗位测试</td></tr><tr><th align="right">岗位类型</th><td style="padding-left: 20px;">其他</td></tr><tr><th align="right">城市</th><td style="padding-left: 20px;">上海&nbsp;&nbsp;</td></tr><tr><th align="right">工作日期</th><td style="padding-left: 20px;">2018-09-05 至 2018-09-20</td></tr><tr><th align="right">工作时间</th><td style="padding-left: 20px;">4:00 - 7:00<br></td></tr><tr><th align="right">工作日期与时间备注</th><td style="padding-left: 20px;"></td></tr><tr><th align="right">用工人数</th><td style="padding-left: 20px;">每次最多111人</td></tr><tr><th align="right" valign="top">岗位职责</th><td style="padding-left: 20px;">1</td></tr><tr><th align="right" valign="top">人员要求</th><td style="padding-left: 20px;">(1)性别要求：<br>(2)身高要求：<br>(3)学历要求：<br>(4)语言要求：<br>(5)健康证要求：<br>(6)其他要求：</td></tr><tr><th align="right" valign="top">用工报酬</th><td style="padding-left: 20px;">基本工资: 111.00人/天&nbsp;&nbsp;提成: 无&nbsp;&nbsp;备注: 无</td></tr><tr><th align="right" valign="top">用工报酬结算周期</th><td style="padding-left: 20px;">日结</td></tr><tr><th align="right" valign="top">服务费</th><td style="padding-left: 20px;"> 服务费：无服务费<br>其他补充：</td></tr> </tbody></table></td></tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table align="center" width="100%" style="padding-top: 20px;border-top: 1px solid #ddd; margin-top: 20px;">
                        <tbody>
                        <tr>
                            <td colspan="2">
                                <table align="center" width="100%">
                                    <tbody>
                                    <tr>
                                        <td colspan="2"><h4>需求单结算</h4></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="padding-left: 30px">其他增值服务项目：{%other_service%}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 30px">费用结算周期：招聘服务费：{%payment_cycle%}</td>
                                    </tr>
                                    <tr><td style="padding-left: 30px"> 是否开具发票：否</td></tr> <tr><td style="padding-left: 30px">甲方付款信息:</td></tr><tr><td style='padding-left: 10%' colspan='2'>付款方式：支付宝&nbsp;&nbsp;&nbsp;&nbsp;账户名称：test&nbsp;&nbsp;&nbsp;&nbsp;账号：13488779034</td></tr><br> <tr><td style="padding-left: 30px">甲方收款信息:</td></tr><tr><td style='padding-left: 10%' colspan='2'>姓名：tianmeijun&nbsp;&nbsp;&nbsp;&nbsp;联系方式：13488779015&nbsp;&nbsp;&nbsp;&nbsp;邮箱：tianmeijun@doumi.com</td></tr><br></td></tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px dashed #ddd;" colspan="2" width="100%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding-top: 20px" width="50%">付款方式：支付宝</td>
                            <td style="padding-top: 20px">乙方收款信息：支付宝账户</td>
                        </tr>
                        <tr>
                            <td>账户名称： {%b_company_name%}</td>
                            <td>账号： {%b_alipay_no%}</td>
                        </tr>
                        <tr>
                            <td style="padding-top: 20px" width="50%">付款方式：银行汇款</td>
                            <td style="padding-top: 20px">乙方开户行：{%b_bank_account%}</td>
                        </tr>
                        <tr>
                            <td>账户名称： {%b_company_name%}</td>
                            <td>账号： {%b_bank_no%}</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>