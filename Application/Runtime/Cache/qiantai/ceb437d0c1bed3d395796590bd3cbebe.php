<?php if (!defined('THINK_PATH')) exit();?><style>
    span{
        color: red;
        text-align: left;
    }
</style>
<link rel="stylesheet" type="text/css" href="/Public/css/validation/formValidation.css" />
<script>
    //    $('#reg').attr('disabled', true);
    ////    console.log($('#checkboxes').is(':checked'))
    //    function change() {
    ////        console.log($('#checkboxes').is(':checked'))
    //        if ($('#checkboxes').is(':checked') == true) {
    //            $('#reg').removeAttr('disabled');
    //        } else {
    //            $('#reg').attr('disabled', true);
    //        }
    //    }

    //    $("#reg").click(function () {
    ////      console.log($('#defaultForm').submit());
    ////        console.log('nihao')
    //
    //        console.log($('#defaultForm').submit());
    //    })

</script>
<div style="background-color: #ffffff" class="col-md-12">
    <div class="container">
        <div class="row">
            <div  align="center" style="padding: 10px;">
            </div>
            <form id="defaultForm" method="post" class="form-horizontal" action="">
                <input type="text" name="type" style="display:none;" value="transport">
                <div class="col-md-6">
                    <div  class="text-right">
                        <div  class="A">
                            <div class="col-md-12" style="text-align: center">
                                <h1>车主注册</h1>
                            </div>
                            <div  class="col-md-12" style="padding-top: 10PX;">
                                <label class="col-md-3">手机号</label>

                                <div class="col-md-8">
                                    <input id="phone" name="phone" type="text" class="form-control"  placeholder="请输入法人或受托人手机号码">
                                </div>

                            </div>
                            <div  class="col-md-12">
                                <label class="col-md-3"></label>

                                <span id="phoneMsg" class="col-md-8">
                                    <!--*请输入有效手机号码-->
                                </span>

                            </div>
                            <div  class="col-md-12" style="padding-top: 10PX;">
                                <label class="col-md-3">密码</label>

                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control"  placeholder="输入密码！">
                                </div>
                            </div>
                            <div  class="col-md-12">
                                <label class="col-md-3"></label>

                                <span class="col-md-8">
                                    <!--*请输入有效手机号码-->
                                </span>

                            </div>

                            <div  class="col-md-12" style="padding-top: 10PX;">
                                <label class="col-md-3">确认密码</label>

                                <div class="col-md-8">
                                    <input type="text" name="repwd" class="form-control"  placeholder="确认密码">
                                </div>
                            </div>
                            <div  class="col-md-12">
                                <label class="col-md-3"></label>

                                <span class="col-md-8">
                                    <!--*请输入有效手机号码-->
                                </span>

                            </div>

                            <div  class="col-md-12" style="padding-top: 10PX;padding-bottom: 10PX;">
                                <label class="col-md-3">验证码</label>

                                <div class="col-md-3">
                                    <input type="text" name="smsCode" class="form-control"  placeholder="输入验证码">
                                </div>
                                <div class="col-md-3">
                                    <div class="text-left">
                                        <button id="yzm" onclick="time()"type="button" class="btn btn-default" style="align-self: auto;border: 1px solid gainsboro">获取验证码
                                        </button>
                                        <script>
                                            var wait=0;
                                            function time() {
                                                $.post(
                                                        '<?php echo U("Index/smsCode");?>',
                                                        {
                                                            phone:$('#phone').val(),
                                                            type:0
                                                        },
                                                        function (data) {
                                                            wait=data.countdown
                                                            if(wait==0){
//                                                                alert(data.describe)
                                                                $('#phoneMsg').html(data.describe)
                                                            }
                                                            timeTest();

                                                        },
                                                        'json'
                                                );
                                            }
                                            function timeTest(){
                                                if (wait == 0) {
                                                    $('#yzm').removeAttr("disabled");
                                                    $('#yzm').val("获取验证码");
                                                } else {
                                                    $('#yzm').attr("disabled", true);
                                                    $('#yzm').val("重新发送(" + wait + ")");
                                                    wait--;
                                                    setTimeout(function () {
                                                                timeTest()
                                                            },
                                                            1000)
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">

                                </div>
                            </div>
                            <div  class="col-md-12" style="padding-top: 10PX;padding-bottom: 10PX;">
                                <label class="col-md-3"></label>

                                <div class="col-md-8" style=";text-align: left;">
                                    <input name="agree" id="checkboxes" type="checkbox"  value="" placeholder="">
                                    请阅读并同意《56智配注册协议》
                                </div>
                            </div>
                            <div  class="col-md-12" style="padding-top: 10PX;padding-bottom: 10PX;">
                                <div class="text-center">
                                    <button  id="reg" type="submit" class="btn btn-primary"
                                             style="align-self: auto;width: 300px;"> 注 册
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
						<textarea class="form-control" name="" rows="20" cols="100%"
                                  style="font-family: '微软雅黑';font-size: 10px;margin-bottom: 10px">
						    56智配网用户服务协议

56智配网用户服务协议（以下简称本协议）由浙江乾泰物流股份有限公司（以下简称本公司）和您签订。
本协议根据啥法规、行政规章应明确？阐述之条款和条件适用于您使用56智配网（所涉域名为 ：www.56zhipei.com下同），所提供的在56智配网平台/ 客户端（包含且不限于，PC、手机等终端）进行的信息发布、订单交易和？？？各方权利义务、？？？相关的功能操作等服务(下称“服务”)。
一、接受条款
1、本协议内容包括协议正文及所有56智配网已经发布或将来可能发布的各类规则？？？发布程序依据要明确？。所有规则为协议不可分割的一部分，与协议正文具有同等法律效力。
2、以任何方式进入56智配网并使用服务即表示您已充分阅读、理解并同意接受本协议的条款和条件(以下合称“条款”)。
3、56智配网有权根据业务需要酌情修订“条款”，并以网站公告的形式进行更新，不再单独通知予您。经修订的“条款”一经在56智配网公布，即产生效力？？？与法规冲突。如您不同意相关修订，请您立即停止使用“服务”。如您继续使用“服务”，则将视为您已接受经修订的“条款”，当您与56智配网发生争议时，应以最新的“条款”为准。
二、账户注册
1、服务使用对象
您确认，在您完成注册程序或以其他56智配网允许的方式实际使用服务时，您应当是具备完全民事权利能力和与所从事的民事行为相适应的行为能力的自然人、法人或其他组织。若您不具备前述主体资格，请勿使用服务，否则您及您的监护人应承担因此而导致的一切后果，且56智配网有权注销（永久冻结）您的账户，并向您及您的监护人索偿？？？追偿？。如您代表一家公司或其他法律主体在56智配网中国站登记，则您声明和保证，您有权使该公司或该法律主体受本协议“条款”的约束。
2、注册账户
2.1在您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，或在您按照激活页面提示填写信息、阅读并同意本协议且完成全部激活程序后，或您以其他56智配网允许的方式实际使用56智配网服务时，您即受本协议的约束。您可以使用您提供或确认的手机号码或者56智配网允许的其它方式作为登录手段进入56智配网。
2.2您可以对账户设置昵称，但您设置的昵称不得侵犯或涉嫌侵犯他人合法权益。如您设置的昵称涉嫌侵犯他人合法权益，56智配网有权终止向您提供服务，并注销您的账户。账户注销后？？？多少时间？，相应的昵称将开放给其他有权用户登记使用。
2.3在完成注册或激活流程时，您应当按照法律法规要求，按相应页面的提示准确提供并及时更新您的资料，以使之真实、及时，完整和准确。如有合理理由怀疑您提供的资料错误、不实、过时或不完整的，应该是客观、真实、明确授权？？？56智配网有权向您发出询问及/或要求改正的通知，并有权直接做出删除相应资料的处理，直至中止、终止对您提供部分或全部56智配网服务，56智配网对此不承担任何责任，您将承担因此产生的任何直接或间接损失及不利后果。
如注册人提供虚假资料，如何识别？如恶意注册如何处理？如资料不真实，如何核对？单位名称变更、合并、分裂，如何处理？多少时间备案？资料虚假的责任，导致货物被骗，谁承担责任？
三、账户安全
您将对使用该账户及密码、校验码进行的一切操作及言论负完全的责任，您同意：
1、本公司通过您的56智配网登录名和密码识别您的指示，您应当妥善保管您的56智配网登录名和密码及身份信息，对于因密码泄露、身份信息泄露所致的损失，由您自行承担。您保证不向其他任何人泄露您的56智配网登录名及密码以及身份信息，亦不使用其他任何人的56智配网登录名及密码。本公司亦可能通过本服务应用您使用的其他产品或设备识别您的指示，？？？不明确？您应当妥善保管处于您或应当处于您掌控下的这些产品或设备，对于这些产品或设备遗失所致的任何损失，由您自行承担。
2、基于计算机端、手机端以及使用其他电子设备的用户使用习惯，我们可能在您使用具体产品？？？还是设备？时设置不同的账户登录模式及采取不同的措施识别您的身份。
3、您同意，（a）如您发现有他人冒用或盗用您的56智配网登录名及密码或任何其他未经合法授权之情形，或发生与56智配网账户关联的手机或其他设备遗失或其他可能危及到56智配网账户安全情形时，应立即以有效方式？？？哪些方式？24小时服务吗？通知本公司，向本公司申请暂停相关服务。申请到暂停时间？ 风险划分？（b）确保您在持续登录56智配网时段结束时，以正确步骤离开网站。本公司不能也不会对因您未能遵守本款约定而发生的任何损失、损毁及其他不利后果负责。您理解本公司对您的请求采取行动需要合理期限，在此之前，本公司对已执行的指令及(或)所导致的您的损失不承担任何责任。
4、您确认，您应自行对您的56智配网账户负责，只有您本人方可使用该账户。该账户不可转让、不可赠与、不可继承，但账户内的相关财产权益可被依法继承。如何确定账户休眠状态？休眠多少时间可以停止服务？
5、您同意，基于运行和交易安全的需要，本公司可以暂时停止提供或者限制本服务部分功能，或提供新的功能，在任何功能减少、增加或者变化时，只要您仍然使用本服务，表示您仍然同意本协议或者变更后的协议。
6、本公司有权了解您使用本公司产品或服务的真实交易背景及目的，您应如实提供本公司所需的真实、全面、准确的信息；如果本公司有合理理由怀疑您提供虚假交易信息的，本公司有权暂时或永久限制您所使用的产品或服务的部分或全部功能。
7、您同意，本公司有权根据？？国家法律或和行政法规所赋予权力的有权机关的要求对您的个人或企业信息以及在56智配网的资金、交易及账户等进行查询、冻结。
四、服务终止
1、服务终止：
1.1您同意，在56智配网未向您收费的情况下，56智配网可自行全权决定以任何理由(包括但不限于56智配网认为您已违反本协议的字面意义和精神，或您以不符合本协议的字面意义和精神的方式行事)终止您的“服务”密码、账户(或其任何部份)或您对“服务”的使用。您同意，在56智配网向您收费的情况下，56智配网应基于合理的怀疑且经有效通知方式的情况下实施上述终止服务的行为。您进一步承认和同意，56智配网根据本协议规定终止您服务的情况下可立即使您的账户无效，或注销您的账户以及在您的账户内的所有相关资料和档案，和/或禁止您进一步接入该等档案或“服务”。这样合法吗？？？？、？账户终止后，56智配网没有义务为您保留原账户中或与之相关的任何信息，或转发任何未曾阅读或发送的信息给您或第三方。此外，您同意，56智配网不会就终止向您提供“服务”而对您或任何第三者承担任何责任。不结算、不清算吗？
1.2您有权向56智配网要求注销您的账户，经56智配网审核同意的，56智配网将注销您的账户，？？？注销资料要求呢？程序呢？手续呢？届时，您与56智配网基于本协议的合同关系即终止。您的账户被注销后，56智配网没有义务为您保留或向您披露您账户中的任何信息，也没有义务向您或第三方转发任何您未曾阅读或发送过的信息。
1.3.您理解并同意，您与56智配网的合同关系终止后（合同性质是啥？ 根据啥法律？）：
a)56智配网有权继续保存您的资料。
b)您在使用服务期间存在违法行为或违反本协议和/或规则的行为的，56智配网仍可依据本协议向您主张权利。
C）您在使用服务期间因使用服务与其他用户之间发生的关系，不因本协议的终止而终止，其他用户仍有权向您主张权利，您应继续按您的承诺履行义务。
六、关于费用。
56智配网保留在根据第一条第3款通知您后，收取“服务”费用的权利。另外，您因进行交易、向56智配网获取有偿服务或接触56智配网服务器而发生的所有应纳税赋，以及相关硬件、软件、通讯、网络服务及其他方面的费用均由您自行承担。56智配网保留在无须发出书面通知，仅在网站公示的情况下，暂时或永久地更改或停止部分或全部“服务”的权利。合法吗？不清算吗？？收费标准呢？ ?
七、服务形式及规则
通过56智配网提供的平台服务，您可选择以下服务形式，并同意遵守并履行各服务形式中约定的规则：
1-1：通过56智配网提供的平台服务，您可在56智配网网站/客户端上发布物流运输信息和服务信息、达成交易意向并进行线下交易？？、不是线上交易吗？。在您选择该项服务时，您同意：56智配网网站仅作为物色交易对象？应该是发布邀约平台？，就货物和服务的交易进行协商，以及获取各种与交易相关的信息。同时，56智配网不涉及用户间因交易而产生的法律关系及法律纠纷，不会且不能牵涉进交易各方的交易当中？？？发布虚假交易信息呢？　责任呢？？、。敬请注意，56智配网不能控制或保证信息的真实性、合法性、准确性，亦不能控制或保证交易所涉及的物品的质量、安全或合法性，以及相关交易各方履行在贸易协议项下的各项义务的能力。56智配网不能也不会控制交易各方能否履行协议义务。此外，您应注意到，与以欺诈手段行事的人进行交易的风险是客观存在的。56智配网希望您在使用56智配网网站时，小心谨慎并运用常识。交易合同需要平台备案吗？
1-2：通过56智配网提供的平台服务，您可在56智配网网站/客户端上就货物的运输选择在线交易服务，并同意就货物运输事宜通过网络电签方式与浙江乾泰物流股份有限公司签订相关协议内容：平台和乾泰啥关系？
1-2-1：按照双方签订的《货物运输合同》履行责任和义务(具体详情内容请参见《货物运输合同》)。
1-2-2：在享受该项服务时，所产生相关费用？？？运费还是平台服务费？由您承担，相关费用根据56智配网资费标准规定收取。
1-2-3：上述条款提及的《货物运输合同》、56智配网资费标准全部条款及内容属于本协议的一部份分？，因此，您必须仔细阅读。请注意，您一旦同意本协议内容，表示同意遵守和履行《货物运输合同》、56智配网资费标准约定内容。
运输合同也是平台规则的一部分，简直乱套啦？？和前面自相矛盾啦？
八、服务使用规范
1、关于您的资料的规则
1.1“您的资料”包括您在注册、发布信息或交易等过程中、在任何公开信息场合或通过任何形式，向56智配网或其他用户提供的任何资料 ，包括数据、文本、软件、音乐、声响、照片、图画、影像、词句或其他材料。您应对“您的资料真实性和＼客观性？？？”负全部责任，而56智配网仅作为您在网上发布和刊登“您的资料”的被动渠道？？用词不当？？、、不是主动签运输合同了吗？。
1.2您同意并承诺，“您的资料”和您提供在56智配网网站上交易的任何“物品”（泛指一切可供依法交易的、有形的或无形的、以各种形态存在的某种具体的物品，或某种权利或利益，或某种票据或证券，或某种服务或行为。本协议中“物品”一词均含此义）:涉嫌违法？特种产品需要特种许可？
a.不会有欺诈成份，与售卖伪造或盗窃无涉；？？？看不懂啊？
b.不会侵犯任何第三者对该物品享有的物权，或版权、专利、商标、商业秘密或其他知识产权，或隐私权、名誉权；
c.不会违反任何法律、法规、条例或规章(包括但不限于关于规范出口管理、凭许可证经营、贸易配额、保护消费者、不正当竞争或虚假广告的法律、法 规、条例或规章)、本协议及相关规则；
d.不会含有诽谤（包括商业诽谤）、非法恐吓或非法骚扰的内容；
e.不会含有淫秽、或包含任何儿童色情内容；
f.不会含有蓄意毁坏、恶意干扰、秘密地截取或侵占任何系统、数据或个人资料的任何病毒、伪装破坏程序、电脑蠕虫、定时程序炸弹或 其他电脑程序；
g.不会直接或间接与下述各项货物或服务连接，或包含对下述各项货物或服务的描述：(i)本协议项下禁止的货物或服务；或(ii)您无权连接或包含的货物或服务。此外，您同意不会：（ⅲ）在与任何连锁信件、大量胡乱邮寄的电子邮件、滥发电子邮件或任何复制或多余的信息有关的方面使用“服务”；(ⅳ)未经其他人士同意，利用“服务”收集其他人士的电子邮件地址及其他资料；或（ⅴ）利用“服务”制作虚假的电子邮件地址，或以其他形式试图在发送人的身份或信息的来源方面误导其他人士；
h.不含有56智配网认为应禁止或不适合通过56智配网网站宣传或交易。
1.3您同意，您不会对任何资料作商业性利用，包括但不限于在未经56智配网事先书面批准的情况下，复制在56智配网网站上展示的任何资料并用于商业用途。
2、关于交易的规则
2.1信息发布。信息发布是由您提供的在56智配网网站上展示的文字描述、图画和/或照片，可以是(a)对您拥有而您希望出售的产品/服务的描述；或(b)对您正寻找的产品/服务的描述。56智配网不对产品描述的准确性或内容负责。
2.2不得操纵交易。您同意不利用帮助实现蒙蔽或欺骗意图的同伙(下属的客户或第三方)，操纵与另一交易方所进行的商业谈判的结果。
2.3不得干扰交易系统。您同意，您不得使用任何装置、软件或例行程序干预或试图干预56智配网的正常运作或正在56智配网上进行的任何交易。您不得采取对任何将不合理或不合比例的庞大负载加诸56智配网网络结构的行动。
2.4关于交易反馈。您不得采取任何可能损害信息反馈系统的完整性的行动，诸如：利用第二会员身份标识或第三者为您本身留下正面反馈；利用第二会员身份标识或第三者为其他用户留下负面反馈(反馈数据轰炸)；或在用户未能履行交易范围以外的某些行动时，留下负面的反馈(反馈恶意强加)。
2.5关于处理交易争议。
(i)56智配网不涉及用户间因交易而产生的法律关系及法律纠纷，不会且不能牵涉进交易各方的交易当中。倘若您与一名或一名以上用户，或与您通过56智配网网站获取其服务的第三者服务用户发生争议，您免除56智配网(及56智配网代理人和雇员)在因该等争议而引起的，或在任何方面与该等争议有关的不同种类和性质的任何(实际和后果性的)权利主张、要求和损害赔偿等方面的责任。
(ii)56智配网有权受理并调处您与其他用户因交易产生的争议，同时有权单方面独立判断其他用户对您的投诉及(或)索偿是否成立，？？？前后矛盾？？？权利来源呢　？若56智配网判断索偿成立，则您应及时使用自有资金进行偿付，否则56智配网有权使用您交纳的保证金（如有）或扣减已购56智配网及其关联公司的产品或服务中未履行部分的费用的相应金额或您在56智配网所有账户下的其他资金(或权益)等进行相应偿付。56智配网没有使用自用资金进行偿付的义务，但若进行了该等支付，您应及时赔偿56智配网的全部损失，否则56智配网有权通过前述方式抵减相应资金或权益，如仍无法弥补56智配网损失，则56智配网保留继续追偿的权利。因56智配网非司法机构，您完全理解并承认，56智配网对证据的鉴别能力及对纠纷的处理能力有限，受理交易争议完全是基于您之委托，不保证争议处理结果符合您的期望，亦不对争议处理结果承担任何责任。56智配网有权决定是否参与争议的调处。
(iii)56智配网有权通过电子邮件等联系方式向您了解情况，并将所了解的情况通过电子邮件等方式通知对方，您有义务配合56智配网的工作，否则56智配网有权做出对您不利的处理结果。
3、违反规则的后果。
3.1倘若56智配网认为“您的资料”可能使56智配网承担任何法律或道义上的责任，或可能使56智配网(全部或部分地)失去56智配网的互联网服务用户或其他用户的服务，则56智配网可自行全权决定对“您的资料”采取56智配网认为必要或适当的任何行动，包括但不限于删除该类资料。您特此保证，您对提交给56智配网的“您的资料”拥有全部权利，包括全部版权。与法律冲突？？？您确认，56智配网没有责任去认定或决定您提交给56智配网的资料哪些是应当受到保护的，对享有“服务”的其他用户使用“您的资料”，56智配网也不必负责。
3.2对于您涉嫌违反承诺的行为对任意第三方造成损害的，您均应当以自己的名义独立承担所有的法律责任，并应确保56智配网免责。
3.3在不限制其他补救措施的前提下，发生下述任一情况，56智配网可立即发出警告，暂时中止、永久中止或终止您的账户资格，删除您的任何现有产品信息，以及您在网站上展示的任何其他资料：(i)您违反本协议；(ii)56智配网无法核实或鉴定您向56智配网提供的任何资料；或(iii)56智配网相信您的行为可能会使您、56智配网用户或通过56智配网或56智配网提供服务的第三者服务用户发生任何法律责任。在不限制任何其他补救措施的前提下，若发现您从事涉及56智配网网站的诈骗活动，56智配网可暂停或终止您的账户。
3.4经生效法律文书确认用户存在违法或违反本协议行为或者56智配网自行判断用户涉嫌存在违法或违反本协议行为的，56智配网有权在56智配网网站/客户端上以网络发布形式公布用户的违法行为并做出处罚（包括但不限于限权、终止服务等）。
九、您授予的许可使用权。
您完全理解并同意不可撤销地授予56智配网及其关联公司？？？下列权利：
1、对于您提供的资料，您授予56智配网及其关联公司独家的、全球通用的、永久的、免费的许可使用权利(并有权在多个层面对该权利进行再授权)，使56智配网及其关联公司有权(全部或部份地)使用、复制、修订、改写、发布、翻译、分发、执行和展示"您的资料"或制作其派生作品，和/或以现在已知或日后开发的任何形式、媒体或技术，将"您的资料"纳入其他作品内。
2、当您违反本协议或与56智配网签订的其他协议的约定，56智配网有权以任何方式通知关联公司，要求关联公司中止、终止对您提供部分或全部服务，且在其经营或实际控制的任何网站公示您的违约情况。
3、同样，当您向56智配网关联公司作出任何形式的承诺，且相关公司？？？不侵权吗？已确认您违反了该承诺，则56智配网有权立即按您的承诺约定的方式对您的账户采取限制措施，包括但不限于中止或终止向您提供服务，并公示相关公司确认的您的违约情况。您了解并同意，56智配网无须就相关确认与您核对事实，或另行征得您的同意，且56智配网无须就此限制措施或公示行为向您承担任何的责任。
十、隐私。
尽管有第九条所规定的许可使用权，但基于保护您的隐私是56智配网的一项基本原则，为此56智配网还将根据56智配网的隐私声明使用"您的资料"。56智配网隐私声明的全部条款属于本协议的一部份，因此，您必须仔细阅读。请注意，您一旦自愿地在56智配网交易地点披露"您的资料"，该等资料即可能被其他人士获取和使用。
十一、责任范围和责任限制。
1、您明确理解和同意，56智配网不对因下述任一情况而发生的任何损害赔偿承担责任，包括但不限于利润、商誉、使用、数据等方面的损失或其他无形损失的损害赔偿(无论56智配网是否已被告知该等损害赔偿的可能性)：(i)使用或未能使用“服务”；(ii)因通过或从“服务”购买或获取任何货物、样品、数据、资料或服务，或通过或从“服务”接收任何信息或缔结任何交易所产生的获取替代货物和服务的费用；(iii)未经批准接入或更改您的传输资料或数据；(iv)任何第三者对“服务”的声明或关于“服务”的行为；或(v)因任何原因而引起的与“服务”有关的任何其他事宜，包括疏忽。
2、56智配网会尽一切努力使您在使用56智配网网站的过程中获得您所需的资源。遗憾的是，56智配网不能随时预见到任何技术上的问题或其他困难。该等困难可能会导致数据损失或其他服务中断。为此，您明确理解和同意，您使用“服务”的风险由您自行承担，且“服务”以“按现状”和“按可得到”的状态提供。56智配网明确声明不作任何种类的明示或暗示的保证，包括但不限于关于适销性、适用于某一特定用途和无侵权行为等方面的保证。56智配网对下述内容不作保证：(i)“服务”会符合您的要求；(ii)“服务”不会中断，且适时、安全和不带任何错误；(iii)通过使用“服务”而可能获取的结果将是准确或可信赖的；及(iv)您通过“服务”而购买或获取的任何产品、服务、资料或其他材料的质量将符合您的预期。通过使用“服务”而下载或以其他形式获取任何材料是由您自行全权决定进行的，且与此有关的风险由您自行承担，对于因您下载任何该等材料而发生的您的电脑系统的任何损毁或任何数据损失，您将自行承担责任。您从56智配网或通过或从“服务”获取的任何口头或书面意见或资料，均不产生未在本协议内明确载明的任何保证责任。
十二.赔偿。
1、您同意，如因您违反本协议或经在此提及而纳入本协议的其他文件，或因您违反法律侵害了第三方的合法权利，或因您违反法律须承担行政或刑事责任，而使第三方或行政、司法机关对56智配网及其子公司、关联公司、分公司、董事、职员、代理人提出索赔或处罚要求（包括司法费用和其他专业人士的费用），您必须全额赔偿给56智配网及其子公司、关联公司、分公司、董事、职员、代理人，并使其等免遭损失。
2、56智配网承诺货主在平台上完成交易时，因平台所提供运输资源？？？的原因所造成的10万以内的货物损失，3个工作日完成理赔；10万以上的货物损失20个工作日内完成理赔。线上还是下下？和谁签订？保险拒赔是也赔偿吗？
３＼赔偿标准？责任划分？第三方追偿权的转让？

十三、通知。
您应当准确填写并及时更新您提供的电子邮件地址、联系电话、联系地址、邮政编码等联系方式，以便56智配网或其他用户与您进行有效联系，因通过这些联系方式无法与您取得联系，导致您在使用56智配网服务过程中产生任何损失或增加费用的，应由您完全独自承担。您了解并同意，您有义务保持你提供的联系方式的有效性，如有变更需要更新的，您应按56智配网的要求进行操作。
十四、不可抗力。
对于因56智配网合理控制范围以外的原因，包括但不限于自然灾害、罢工或骚乱、物质短缺或定量配给、暴动、战争行为、政府行为、通讯或其他设施故障或严重伤亡事故等，致使56智配网？？？延迟或未能履约的，56智配网不对您承担任何责任。
十五.法律适用、管辖及其他
1、本协议之效力、解释、变更、执行与争议解决均适用中华人民共和国大陆地区法律。
2、您与56智配网仅为独立订约人关系？？？啥性质？网站有主体资格吗？。本协议无意结成或创设任何代理、合伙、合营、雇佣与被雇佣或特性授权与被授权关系。
3、您同意56智配网因经营业务需要有权将本协议项下的权力义务就部分或全部进行转让，而无须再通知予您并取得您的同意。
4、因本协议或56智配网服务所引起或与其有关的任何争议应向56智配网所在地人民法院提起诉讼。
5、本协议取代您和56智配网先前就相同事项订立的任何书面或口头协议。倘若本协议任何条款被裁定为无效或不可强制执行，该项条款应被撤销，而其余条款应予遵守和执行。条款标题仅为方便参阅而设，并不以任何方式界定、限制、解释或描述该条款的范围或限度。56智配网未就您或其他人士的某项违约行为采取行动，并不表明56智配网撤回就任何继后或类似的违约事件采取动的权利。？？？
开始实施时间？网站注册登记时间？关联公司名称？



						</textarea>
                </div>

            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/js/validation/formValidation.js"></script>
<script type="text/javascript" src="/Public/js/validation/zh_CN.js"></script>
<script type="text/javascript" src="/Public/js/validation/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).ready(function() {
            // Generate a simple captcha
            function randomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            };
            $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

            $('#defaultForm')
                    .formValidation({
                        message: 'This value is not valid',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
//                    phone: {
//                        row: '.col-md-8',
//                        validators: {
//                            notEmpty: {
//                                message: '账号名必填'
//                            }
//                        }
//                    },
//                    lastName: {
//                        row: '.col-sm-4',
//                        validators: {
//                            notEmpty: {
//                                message: 'The last name is required'
//                            }
//                        }
//                    },
                            phone: {
                                row: '.col-md-8',
                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: '用户名必须设置'
                                    },
//                            stringLength: {
//                                min: 6,
//                                max: 30,
//                                message: '用户名必须在6-30个字符之间'
//                            },
//                            regexp: {
//                                regexp: /^[a-zA-Z0-9_\.]+$/,
//                                message: 'The username can only consist of alphabetical, number, dot and underscore'
//                            },
                                    phone: {
                                        country: 'CN',
                                        message:'请输入有效的手机号码'
                                    }
                                }
                            },
//                    email: {
//                        validators: {
//                            notEmpty: {
//                                message: '电子邮件不能为空'
//                            },
//                            emailAddress: {
//                                message: '请输入有效的电子邮件地址'
//                            }
//                        }
//                    },
                            password: {
                                row:'.col-md-8',
                                validators: {
                                    notEmpty: {
                                        message: '密码不能为空'
                                    },
                                    different: {
                                        field: 'phone',
                                        message: '密码不能和用户名相同'
                                    }
                                }
                            },
                            repwd: {
                                row:'.col-md-8',
                                validators: {
                                    notEmpty: {
                                        message:'请确认密码'
                                    },
                                    identical: {
                                        field: 'password',
                                        message: '密码不一致'
                                    }
                                }
                            },
//                    gender: {
//                        validators: {
//                            notEmpty: {
//                                message: '必须选择一个性别'
//                            }
//                        }
//                    },
                            agree: {
                                row:'.col-md-8',
                                validators: {
                                    notEmpty: {
                                        message: '必须同意56智配网注册协议才能注册'
                                    }
                                }
                            },
                            captcha: {
                                validators: {
                                    callback: {
                                        message: 'Wrong answer',
                                        callback: function(value, validator, $field) {
                                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                            return value == sum;
                                        }
                                    }
                                }
                            },
//                    agree: {
//                        validators: {
//                            notEmpty: {
//                                message: 'You must agree with the terms and conditions'
//                            }
//                        }
//                    }
                        }
                    })
                    .on('success.form.fv', function(e) {
                        // Prevent form submission
                        e.preventDefault();

                        // Get the form instance
                        var $form = $(e.target);

                        // Get the FormValidation instance
                        var bv = $form.data('formValidation');

                        // Use Ajax to submit form data
                        $.post('<?php echo U("Index/reg");?>', $form.serialize(), function(data) {
                            console.log(data);
                            if (data.result == 'success') {
                                alert('注册成功')
                                window.location.replace('<?php echo U("index");?>')
                            } else if (data.result == 'error') {
                                alert(data.describe);
//                                    window.location.reload()
                            }
                        }, 'json');
                    });

        });
        ;
    });
</script>