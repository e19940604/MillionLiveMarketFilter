/**
 * Created by e19940604 on 2017/6/4.
 */
var idolList = $('#idolList');
var typeList = $('#typeList');
var idol = Object();
idol["Vi"] = '<option value="0" >--全部--</option>' +
    '<option class="Vi-type" value="9">秋月律子</option>' +
    '<option class="Vi-type" value="16">伊吹翼</option>' +
    '<option class="Vi-type" value="33">北沢志保</option>' +
    '<option class="Vi-type" value="45">篠宮可憐</option>' +
    '<option class="Vi-type" value="49">周防桃子</option>' +
    '<option class="Vi-type" value="21">徳川まつり</option>' +
    '<option class="Vi-type" value="20">所恵美</option>' +
    '<option class="Vi-type" value="41">豊川風花</option>' +
    '<option class="Vi-type" value="30">中谷育</option>' +
    '<option class="Vi-type" value="26">七尾百合子</option>' +
    '<option class="Vi-type" value="38">二階堂千鶴</option>' +
    '<option class="Vi-type" value="4">萩原雪歩</option>' +
    '<option class="Vi-type" value="11">双海亜美</option>' +
    '<option class="Vi-type" value="12">双海真美</option>' +
    '<option class="Vi-type" value="3">星井美希</option>' +
    '<option class="Vi-type" value="42">宮尾美也</option>' +
    '<option class="Vi-type" value="25">ロコ</option>';

idol['Vo'] = '<option value="0" >--全部--</option>' +
    '<option class="Vo-type" value="1">天海春香</option>' +
    '<option class="Vo-type" value="14">春日未来</option>' +
    '<option class="Vo-type" value="2">如月千早</option>' +
    '<option class="Vo-type" value="35">木下ひなた</option>' +
    '<option class="Vo-type" value="8">四条貴音</option>' +
    '<option class="Vo-type" value="50">ジュリア</option>' +
    '<option class="Vo-type" value="27">高山紗代子</option>' +
    '<option class="Vo-type" value="17">田中琴葉</option>' +
    '<option class="Vo-type" value="31">天空橋朋花</option>' +
    '<option class="Vo-type" value="22">箱崎星梨花</option>' +
    '<option class="Vo-type" value="28">松田亜利沙</option>' +
    '<option class="Vo-type" value="10">三浦あずさ</option>' +
    '<option class="Vo-type" value="7">水瀬伊織</option>' +
    '<option class="Vo-type" value="15">最上静香</option>' +
    '<option class="Vo-type" value="24">望月杏奈</option>' +
    '<option class="Vo-type" value="36">矢吹可奈</option>';

idol['Da'] = '<option value="0" >--全部--</option>' +
    '<option class="Da-type" value="32">エミリー</option>' +
    '<option class="Da-type" value="40">大神環</option>' +
    '<option class="Da-type" value="13">我那覇響</option>' +
    '<option class="Da-type" value="6">菊地真</option>' +
    '<option class="Da-type" value="48">北上麗花</option>' +
    '<option class="Da-type" value="29">高坂海美</option>' +
    '<option class="Da-type" value="19">佐竹美奈子</option>' +
    '<option class="Da-type" value="18">島原エレナ</option>' +
    '<option class="Da-type" value="5">高槻やよい</option>' +
    '<option class="Da-type" value="47">永吉昴</option>' +
    '<option class="Da-type" value="23">野々原茜</option>' +
    '<option class="Da-type" value="39">馬場このみ</option>' +
    '<option class="Da-type" value="43">福田のり子</option>' +
    '<option class="Da-type" value="34">舞浜歩</option>' +
    '<option class="Da-type" value="44">真壁瑞希</option>' +
    '<option class="Da-type" value="46">百瀬莉緒</option>' +
    '<option class="Da-type" value="37">横山奈緒</option>';

idol['0'] = '<option value="0" >--全部--</option>';

typeList.change( function(){
    idolList.empty();
    idolList.append( idol[ typeList.val() ] );
}) ;










