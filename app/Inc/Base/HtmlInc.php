<?php

return [
    'html' => '
    <div style="font-family: \'hiragino sans gb\', \'Microsoft YaHei\'; color: #4b4b4b; font-size:16px;">
    <div style="font-size: 14px; line-height: 28px;">{%link_name%} 你好：</div>
    <div style="font-size: 14px; line-height: 28px; text-indent:2em; padding-bottom:30px;">
        贵公司与斗米合作的需求单：{%start_at%}至{%end_at%}的招聘服务具体如下，请查看后进行确认。<br/>
        确认地址：<a href="{%push_link_url%}" target="_blank">{%push_link_url%}</a><br>
        确认操作码：{%op_password%}<br/>请在及时完成操作，48小时后将失效!
    </div>
    <hr>
    <h2 style="font-size: 18px; font-weight: 700; line-height: 30px; text-align: center; padding-top: 50px;">
        招聘需求确认书</h2>
    <div style="font-size: 16px; line-height: 28px;">
        <table width="1000px" align="center" style="font-size: 16px; font-family: \'hiragino sans gb\', \'Microsoft YaHei\';">
            <tbody>
                <tr>
                    <td>
                        <!-- 商家信息 -->
                        <table width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td width="50%">甲方(客户)：田美君集团</td>
                                    <td>乙方：北京新城科技发展有限公司</td>
                                </tr>
                                <tr>
                                    <td>对应合同：NBWB1809050001QT</td>
                                    <td>合同类型：外包合同</td>
                                </tr>
                                <tr>
                                    <td>合同状态：{$data[\'contract_status\']}</td>
                                    <td>合同有效期：{contract_start_at} 至 {contract_start_at}</td>
                                </tr>
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
                            {{--{%post_list_content%}--}}
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
                                            <!--<td>总费用支付日期不得晚于：{%payment_return_end%}</td>-->
                                        </tr>
                                        <!--  <tr>
                                              <td style="padding-left: 30px" colspan="2">其他要求说明：{%payment_other_remark%}</td>
                                          </tr>-->
                                        <tr><td style="padding-left: 30px">结算周期：日结</td></tr>
                                        <tr><td style="padding-left: 30px"> 是否开具发票：是</td></tr>
                                        <tr><td style="padding-left: 30px">甲方付款信息:</td></tr>
                                        <tr><td style=\'padding-left: 10%\' colspan=\'2\'>付款方式：银行&nbsp;&nbsp;&nbsp;&nbsp;账户名称：{$value[\'account_title\']}&nbsp;&nbsp;&nbsp;&nbsp;账号：{$value[\'account_number\']}&nbsp;&nbsp;&nbsp;&nbsp;开户行：{$value[\'account_open\']}</td></tr><br>
                                        <tr><td style="padding-left: 30px">甲方收款信息:</td></tr>
                                        <tr><td style=\'padding-left: 10%\' colspan=\'2\'>姓名：{$value[\'contact_person_name\']}&nbsp;&nbsp;&nbsp;&nbsp;联系方式：{$value[\'contact_person_phone\']}&nbsp;&nbsp;&nbsp;&nbsp;邮箱：{$value[\'contact_person_email\']}</td></tr><br>
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
    '
];