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
                <input type="text" name="type" style="display:none;" value="company">
                <div class="col-md-6">
                    <div  class="text-right">
                        <div  class="A">
                            <div class="col-md-12" style="text-align: center">
                                <h1>货主注册</h1>
                            </div>
                            <div  class="col-md-12" style="padding-top: 10PX;">
                                <label class="col-md-3">手机号</label>

                                <div class="col-md-8">
                                    <input id="phone" name="phone" type="text" class="form-control"  placeholder="请输入法定代表人或授权委托人手机号码">
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
                                    <input name="agree" id="checkboxes" type="checkbox"  value="" placeholder="">请谨慎阅读并同意《56智配物流交易服务协议》
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

“56智配”物流交易平台服务协议
欢迎使用“56智配”物流交易平台服务！
本协议根据《中华人民共和国合同法》、《互联网信息服务管理办法》、关于网上交易的指导意见（暂行）》、《网络商品交易及有关服务行为管理暂行办法》、《网络零售第三方平台交易规则制定程序规定（试行）》的规定，参照《第三方电子商务交易平台服务规范》制定，由承诺遵守本协议规定，同意并使用“56智配”物流交易平台服务（B2B）的法律实体（下称“注册用户”或“您”），包括发布货物托运信息、交付货物承运的货主（下称“托运商”）及发布车辆待运信息、提供承运服务的物流服务商（下称“承运商”），与提供“56智配”物流交易平台服务的浙江乾泰物流股份有限公司（以下统称“56智配”）缔结。本协议具有合同效力，一旦您使用了该服务，即表示您已接受了以下所述的条款和条件。
一、协议内容范围及生效：
1、协议内容包括本协议正文及“56智配”物流交易平台已经发布的或将来可能发布的交易一般规则和特别规则。所有规则为协议不可分割的一部分，与协议正文具有同等法律效力，但特别规则优先适用。
2、注册用户在使用“56智配”提供的各项服务的同时，承诺接受并遵守各项相关规则的规定。“56智配”有权根据物流交易的发展，制定、修改本协议或各类规则，如本协议有任何变更，“56智配”将在网站上以公示形式通知予注册用户。如注册用户不同意相关变更，应立即停止使用“56智配”物流交易平台服务和相关功能。任何修订和新规则依法在“56智配”网站公布即自动适用于注册用户，成为本协议的一部分。注册用户登录或继续使用服务的行为即视为接受经修订的协议。除“56智配”另行明确声明外，任何使服务范围扩大或功能增强的新内容均受本协议约束。
3、“56智配”提示您务必在使用本服务之前认真阅读本协议全部内容，并就疑问向“56智配”客服咨询。如您进行同意并接受本协议的操作，本协议即按约定的方式生效。如果您不同意本协议的约定，则不能使用或继续使用“56智配”物流交易平台服务和相关功能。
4、注册用户签署或在线接受本协议之后，须经过“56智配”审核并认证资信，“56智配”对通过资信认证的注册用户发出服务开通通知时，本协议即在注册用户和“56智配”之间产生法律效力。
二．定义：
1、“56智配网站”是指由浙江乾泰物流股份有限公司提供技术支持和服务的电子商务平台网站，网址为www.56zhipei.com。
2、“56智配APP”：是指“56智配”向注册用户提供服务的移动客户端平台，分别为由托运商使用的“货主端”和由承运商使用的“车主端”，是“56智配”网上交易平台的一部分。
3、“注册用户及注册”：注册用户必须是符合本协议第四条规定，并按用户注册规则填写相关信息，完成注册程序，取得“56智配”认证，并与“56智配达成本协议的法律实体。
注册用户应妥善保管其“56智配”物流交易平台注册帐户及密码信息，不得以任何形式擅自转让或授权他人使用，任何通过其注册帐户和密码进行的交易及使用其他服务的操作均被视为该用户意思表示真实的行为，其法律后果由该用户承担。
如无经营资格或违反本协议第五条之声明与保证的组织不当注册为“56智配”用户，或超越其民事权利或行为能力范围从事交易的，其与“56智配”之间的协议自始无效。“56智配”有权立即注销该注册的帐户，并追究其使用该服务的一切法律责任。
注册是指托运商或承运商进入“56智配”网站主页，分别点击货主注册或车主注册打开注册页面，按要求填写相关信息、在线接受并同意履行“56智配”网站物流交易平台服务协议、交易一般规则及特别规则等用户协议的过程。
4、“56智配网物流交易平台注册用户识别码”：当您自愿签署“56智配”服务协议，完成注册程序使用服务时，“56智配”会向您提供唯一编号的注册用户识别码（下称“用户识别码”）。用户识别码的作用在于保障注册用户享受“56智配”服务，区别不同物流信息，防范不正当竞争。
5、“服务”：是指由浙江乾泰物流股份有限公司在“56智配”物流交易平台上向注册用户提供的专用会员中心、互联网信息发布、商业推广及与此有关的互联网技术服务。具体服务内容如下：
5.1、专用会员中心服务：“56智配”提供注册用户专用会员中心。
5.2、网络信息服务：指用户根据本协议的规定发布货物托运信息、发布物流服务信息、达成交易、利用个人平台查询物流服务历史信息以及其他由“56智配”同意提供的信息服务。
5.3、“56智配”物流交易平台诚信交易评级推荐服务：指“56智配”物流交易平台举办的，对注册用户诚信优质交易行为评级，并在推广活动页面中推荐展示的服务。评级推荐服务目的在于扩大诚信优质注册用户的影响，鼓励建设公平、有序的网络交易环境。
5.4、其他服务：包括但不限于“56智配”下设或合作的智配站配套信息展示、市场调研、商业推广、广告等服务，该服务由注册用户和“56智配”协商确定。 “56智配”保留在任何时候自行决定对服务及其相关功能、应用软件做变更、升级的权利。“56智配”进一步保留在服务中开发新的模块、功能和软件或其它语种服务的权利。上述所有新的模块、功能、软件服务的提供，除非“56智配”另有说明，否则仍适用本协议。服务随时可能因“56智配”的单方判断而被增加或修改，或因定期、不定期的维护而暂缓提供，注册用户将会得到相应的变更通知。注册用户在此同意“56智配”在任何情况下都无需向其或第三方在使用服务时对其在传输或联络中的迟延、不准确、错误或疏漏及因此而致使的损害负责。
三、申请条件：
申请使用服务的注册用户必须同时满足以下条件：
（一）持有中华人民共和国工商部门颁发的真实、合法、有效的营业执照、组织机构代码、税务登记证，或三证合一的资格证书，并获身份认证通过；
（二）托运商具有托运货物的行业经营资格并实际从事该行业经营；
（三）承运商具有物流服务经营资格并实际从事物流服务；
（四）获得“56智配”企业实名认证认可。
四、服务的开通：
（一）服务将在以下条件满足后的十个工作日内开通：
1. 注册用户符合本协议第三条规定的申请条件；
2. 注册用户按用户注册规则完成注册信息和相关资料的登记；
3. 勾选“阅读并同意《56智配物流交易平台服务协议》”；
4. 注册用户经“56智配”审核认证并收到“56智配”发出的服务开通通知。
（二）服务期自物流交易服务实际开通日起算。“56智”将按本协议规定的通知方式通知注册用户服务开通日。
五、注册用户的声明与保证
（一）承诺符合注册用户的申请条件，且向“56智配”提供真实、合法、准确、有效的注册资料，并保证其诸如电子邮件地址、联系电话、联系地址、邮政编码等内容的有效性及安全性，保证“56智配”及其他用户可以通过以上联系方式与自己进行联系。同时，注册用户也有义务在相关资料实际变更时及时更新有关注册资料。注册用户保证不以他人资料在“56智配”进行注册。
（二）承诺有合法的权利缔结本协议和使用服务，并承诺遵守本协议以及所有公示于“56智配”网站的规则和流程。
（三）承诺发布的所有信息真实、准确和完整，符合相关法律法规、“56智配”网站普通规则及特别规则，同时对其发布的交易信息中所涉货物信息、托运信息、物流服务、车辆信息有合法的权利，所发布的全部货运要约或物流服务交易信息符合向“56智配”所做的承诺。
（四）承诺交易行为符合有关法律法规和国家强制性标准规定和本协议的要求，不得利用获取的在线货源、车源信息进行线下私自交易，提供物流服务。
（五）保证在使用服务进行交易的过程中遵守诚实信用的原则，不在交易过程中采取不正当竞争行为，不扰乱网上交易的正常秩序，不从事与网上交易无关的行为。
（六）同意不对“56智配”物流交易平台上任何数据作非本协议下的目的的商业性利用，包括但不限于在未经“56智配”事先书面同意的情况下，售卖在“56智配”物流交易平台上获取的数据或其他注册用户展示的任何信息资料。
（七）承诺对其专用的会员中心负有管理义务，对其发布的违反国家有关法律、法规规定及“56智配”规则的信息予以立即删除。
（八）承诺拥有合法的权利和资格向“56智配”物流交易平台上传货物预托运信息、物流服务信息并进行管理，且前述行为未对任何第三方合法权益，包括但不限于第三方知识产权、物权等构成侵害，如因其行为导致“56智配”遭受任何第三方提起的索赔，诉讼或行政责任，其将承担相应责任并使“56智配”免责。
（九）完成注册信息登记，在线接受本协议，并不当然导致本协议发生法律效力，本协议是附条件生效协议，即必须经过“56智配”对其提交的全部资料审核通过后方可生效。故您同意并认可“56智配”有权独立地对您的入驻资料、品牌经营权限开通申请进行评估、判断。审核结果以“56智配”评估、判断为准。您对此不持有任何异议。
六、“56智配”的权利和义务：
（一）“56智配”有义务在现有技术上维护整个“56智配”物流交易平台上服务的正常运行，并努力提升和改进技术，使注册用户网上交易活动得以顺利进行；“56智配”有权根据注册用户营业执照的经营范围以及注册用户对自己登记的经营范围描述，自行决定或调整允许注册用户发布的货物或物流服务类目、种类和数量，注册用户对此不持任何异议。
（二）对注册用户在注册使用服务中所遇到的与交易或注册有关的问题及反映的情况，“56智配”应及时作出回复。
（三）因网上交易平台的特殊性，“56智配”没有义务对所有注册用户的交易行为以及与交易有关的其它事项进行事先审查，但如存在下列情况之一的，“56智配”有权以普通非专业人员的知识水平标准对相关内容进行判别。如认为这些内容或行为具有违法或不当性质的，“56智配”有权根据不同情况选择删除相关信息或停止对该注册用户提供服务，并追究相关法律责任。
1、第三方通知“56智配”，认为某个具体注册用户或具体交易事项已经发生或可能存在重大问题；
2、注册用户或第三方向“56智配”告知交易平台上有违法或不当行为的。
（四）“56智配”有权对注册用户的注册数据及交易行为进行查阅，发现注册数据或交易行为中存在任何问题或怀疑，均有权向注册用户发出询问或要求改正的通知，或者直接作出删除等处理。
（五）经生效法律文书或行政处罚决定确认注册用户存在违法行为，或者“56智配”有足够事实依据可以认定注册用户存在违法或违反协议行为的，“56智配”有权在“56智配”物流交易平台或者合作网站公布注册用户的违法和/或违规行为。
（六）对于注册用户在“56智配”物流交易平台发布的下列各类信息，“56智配”有权在不通知注册用户的前提下进行删除或采取其它限制性措施，包括但不限于以规避费用为目的的信息；以炒作信用为目的的信息；“56智配”有理由相信存在欺诈等恶意或虚假内容的信息；“56智配”有理由相信与网上交易无关或不是以交易为目的的信息；“56智配”有理由相信存在恶意竞价或其它试图扰乱正常交易秩序因素的信息；“56智配”有理由相信属违反公共利益或可能严重损害“56智配”和/或其它用户合法利益的信息。
（七）注册用户在此授予“56智配”独占的、免费的权利，包括使用、复制、修订、改写、发布、翻译、分发、执行和展示注册用户公示于网站的各类信息或制作其派生作品，和/或以现在已知或日后开发的任何形式、媒体或技术，将上述信息纳入其它作品内。
（八）因辨认注册用户终端和提供个性化服务的需要，“56智配”在注册用户的计算机上设定或取用“56智配”物流交易平台cookies。“56智配”允许在“56智配”物流交易平台网页上发布广告的公司，到注册用户计算机上设定或取用cookies，并在注册用户登录时获取数据。阿里巴巴使用cookies可为注册用户提供个性化服务。如果拒绝cookies，注册用户将不能使用该服务。
七、费用规定：
本协议约定的物流交易平台服务目前为免费服务，但“56智配”有权提前15天在“56智配”网站发布公告后向注册用户收费。注册用户若拒绝向“56智配”支付费用，应立即停止使用“56智配”的服务。
八、协议的终止：
（一）通知解除：协议任何一方均可以提前十五天书面通知的方式终止本协议。
（二）“56智配”单方解除权：如注册用户违反“56智配”物流交易平台的任何规则或本协议中的承诺、保证或约定，“56智配”都有权立刻终止本协议，且按有关规则的约定，要求注册用户承担违约责任。如注册用户交付承运的货物或提供的物流服务为假冒他人商标的，或第三方多次投诉其货物不符合标的或物流服务质量低劣等违法或违约行为的，则“56智配”除有权立即终止本协议外，并有权追究注册用户相应法律责任。
（三）注册用户在超过九十天的时间内未以“56智配”物流交易平台帐户及密码登录“56智配”物流交易平台的，“56智配”有权终止本协议。
（四）本协议规定的其他协议终止条件发生或实现，导致本协议终止。
（五）协议终止后有关事项的处理：
1.协议终止后，“56智配”无义务保留托运商或承运商在“56智配”物流交易平台的注册帐户及与之相关的任何信息，或转发任何未曾阅读或发送的信息给注册用户或第三方，亦不就终止协议而对注册用户或任何第三者承担任何责任；
2.无论本协议因何原因终止，在协议终止前的行为所导致的任何赔偿和责任，托运商或承运商必须完全且独立地承担；
3.协议终止后，“56智配”有权保留该托运商或承运商的注册数据及以前的交易行为记录。如托运商或承运商在协议终止前在“56智配”物流交易平台上存在违法行为或违反协议的行为，“56智配”仍可行使本协议所规定的权利；
4. 协议终止之前，1）注册用户已经上传至“56智配”物流交易平台网的预运货物信息或物流服务信息尚未达成交易协议的，“56智配”有权在协议终止时同时删除此项物流服务的相关信息；2）注册用户已经与另一注册用户就某物流服务在线达成交易协议的，“56智配”可以不删除该项交易，但“56智配”有权在协议终止的同时将协议终止的情况通知该交易的相对方。
九、协议期限：
本协议经注册用户在线接受且经过“56智配”审核认证通过后即告生效，除非本协议规定的终止条件发生，本协议将持续有效。双方另有约定的除外。
十、有效通知:
“56智配”可自: qt56@service.56zhipei.com邮址向注册用户在“56智配”注册时提供的电子邮件地址发出通知。通知的送达以邮件发出为准。
十一、保密条款：
注册用户应对从“56智配”物流交易平台获知的货源、车源信息及“56智配”提供的相关物流数据严格保密。就相关货源、车源信息，未经该注册用户同意不得向任何第三人透露或用于非本协议下的目的；就“56智配”提供的相关物流数据，未经“56智配”同意不得向任何第三人透露或用于非本协议下的目的。注册用户的保密义务不因本协议的终止/解除而失效。
十二、“56智配”的法律地位
“56智配”物流交易平台仅作为注册用户物色交易对象，就货物和服务的交易进行协商，以及获取各类与物流相关的服务地点。本协议的签署并不意味着“56智配”成为物流服务商，在“56智配”物流交易平台网上与第三方所进行交易的参与者。对前述交易，“56智配”仅提供技术服务，不对注册用户行为的合法性、有效性及货源发布、物流服务的真实性、合法性和有效性作任何明示或暗示的担保。注册用户因进行交易而发生的所有应纳税赋，均由注册用户自行负责支付。
十三、有限责任：
（一）服务将按"现状"和按"可得到"的状态提供。“56智配”在此明确声明对服务不作任何明示或暗示的保证，包括但不限于对服务的可适用性，没有错误或疏漏，持续性，准确性，可靠性，适用于某一特定用途之类的保证，声明或承诺。“56智配”对服务所涉的技术和信息的有效性，准确性，正确性，可靠性，质量，稳定，完整和及时性均不作承诺和保证。
（二）使用服务下载或者获取任何资料的行为均出于注册用户的独立判断并自行承担风险。每一个注册用户独自承担因此对其电脑系统或资料灭失造成的损失。
（三）不论在何种情况下，“56智配”均不对由于Internet连接故障，电脑，通讯或其他系统的故障，电力故障，罢工，劳动争议，暴乱，起义，骚乱，生产力或生产资料不足，火灾，洪水，风暴，爆炸，不可抗力，战争，政府行为，国际、国内法院的命令或第三方的不作为而造成的不能服务或延迟服务承担责任。
（四）不论是否可以预见，不论是源于何种形式的行为，“56智配”不对由以下原因造成的任何特别的，直接的，间接的，惩罚性的，突发性的或有因果关系的损害或其他任何损害（包括但不限于利润或利息的损失，营业中断，资料灭失）承担责任。
1. 使用或不能使用平台服务；
2. 通过平台获取任何物流服务，货源样品、数据信息，或进行交易，或其他可替代上述行为的行为而产生的费用；
3. 未经授权的存取或修改数据或数据的传输；
4. 第三方通过服务所作的陈述或行为；
5. 其它与服务相关事件，包括疏忽等，所造成的损害。
十四、违约责任：
（一）注册用户同意赔偿由于使用服务（包括但不限于将注册用户资料展示在网站上）或违反本协议而给“56智配”造成的任何损失（包括由此产生的催告费用、差旅费、保全费、公告费、执行费、全额的诉讼费用、律师费等实现债权的费用）。注册用户同意“56智配”不对任何其张贴的资料，包括诽谤性的，攻击性的或非法的资料，承担任何责任；由于此类材料对其它用户造成的损失由注册用户自行全部承担。
（二）注册用户承诺，不会采取任何手段或措施转移其可以通过“56智配”物流交易平台在线达成的交易，包括但不限于明示或暗示用户或通过其他方式；如有违反，“56智配”将有权立即终止本协议，并将其保证金作为违约金予以划扣，还可就违约行为向注册用户追偿。
（三）除本协议及“56智配”物流交易平台规则另有约定之外，如一方发生违约行为，守约方可以书面通知方式要求违约方在指定的时限内停止违约行为，并就违约行为造成的损失进行索赔，如违约方未能按时停止违约行为，则守约方有权立即终止本协议。
十五、争议解决及其他：
（一）本协议的解释、适用、解决争议，均应依照中华人民共和国法律予以处理，并以浙江省衢州市柯城区人民法院为第一审管辖法院。
（二）本协议的任何条款无效，不影响争议解决条款的法律效力。
（三）一方因他方过失或违约而放弃本协议规定的权利，不视为持续放弃权利的意思表示。

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