@extends('layouts._default')

@section('content')
    <div id="page">
        <div class="container">
            <form action="{{ url('basic') }}" method="post" name="dynamicForm" class="form-horizontal">
                {{csrf_field()}}
                <div class="row sectionTitle">
                    <h1>Basic Information</h1>
                </div>
                <div class="row sectionBody">
                    <div class="sectionPan panel panel-default col-md-7 shadow">
                        <div class="panel-body">
                            <div class="legend tfiBlueDark">個人基本資料
                                <hr class="small-top">
                            </div>
                            @include('basic/_basic')
                            @include('basic/_eduExperience')
                        </div>
                    </div>
                    <div class="pull-right col-md-5 hidden-xs hidden-sm">
                        <div class="affix col-md-5" data-offset-top="60" data-offset-bottom="1000">
                            @include('partials/_hint')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function displayExample(dom) {
            var exampleHelpText = '...';
            var exampleText = '...';
            if (dom == 'name') {
                exampleHelpText = '請輸入您的中文全名。';
                exampleText = '熊小編';
            }
            if (dom == 'sex') {
                exampleHelpText = '請選擇您的生理性別(必填)';
                exampleText = '男性';
            }
            if (dom == 'idNumber') {
                exampleHelpText = '請輸入您的室內電話號碼(必填)';
                exampleText = 'A123456789';
            }
            if (dom == 'birthday') {
                exampleHelpText = '請輸入您的出生年月日。(必填)';
                exampleText = '1988年9月28日';
            }
            if (dom == 'phone') {
                exampleHelpText = '請輸入您的手機電話號碼。(選填)';
                exampleText = '09XXXXXXXX';
            }
            if (dom == 'cellPhone') {
                exampleHelpText = '請輸入您的手機電話號碼。';
                exampleText = '09XXXXXXXX';
            }
            if (dom == 'skype') {
                exampleHelpText = '請輸入您的skype帳號。';
                exampleText = 'Skype ID';
            }
            if (dom == 'email') {
                exampleHelpText = '請輸入您最常使用的e-mail。(高度建議您填寫gmail帳號) ';
                exampleText = 'teach4taiwan@gmail.comE-mail address';
            }
            if (dom == 'sec_email') {
                exampleHelpText = '請輸入您備用的e-mail信箱(選填)';
                exampleText = 'teach4taiwan@gmail.com';
            }
            if (dom == 'address') {
                exampleHelpText = '請輸入您的戶籍地址。';
                exampleText = '台北市大安區復興南路二段318號3樓';
            }
            if (dom == 'status') {
                exampleHelpText = '請選擇一個符合您目前就學或就業狀態的描述。';
                exampleText = '現階段有工作';
            }
             if (dom == 'school') {
                exampleHelpText = '請輸入曾就讀學校全名';
                exampleText = '國立台北教育大學';
            }
            if (dom == 'eduArea') {
                exampleHelpText = '請輸入您高中畢業之年月';
                exampleText = '2006年6月';
            }
            document.getElementById("exampleHelpText").innerHTML = exampleHelpText;
            document.getElementById("exampleText").innerHTML = exampleText;
        }
        function dynamicSelect($mainClass, $subClass, selectValues) {
            $mainClass.change(function () {
                if (selectValues[$mainClass.val()]) {
                    $subClass.empty().append(function () {
                        var output = '';
                        $.each(selectValues[$mainClass.val()], function (key, value) {
                            output += '<option value' + value + '>' + key + '</option>';
                        });
                        return output;
                    });
                }
            }).change();
        }
        $(function () {
            var majorSelectValues = {
                "3001000000": {
//                    "教育學科類": "3001000000",
                    "綜合教育相關": "3001001000",
                    "普通科目教育相關": "3001002000",
                    "專業科目教育相關": "3001003000",
                    "學前教育相關": "3001004000",
                    "其他教育相關": "3001005000"
                },
                "3002000000": {
//                    "藝術學科類": "3002000000",
                    "美術學相關": "3002001000",
                    "雕塑藝術相關": "3002002000",
                    "美術工藝相關": "3002003000",
                    "音樂學器相關": "3002004000",
                    "戲劇舞蹈相關": "3002005000",
                    "電影藝術相關": "3002006000",
                    "室內藝術相關": "3002007000",
                    "藝術商業設計": "3002008000"
                },
                "3003000000": {
//                    "語文及人文學科類": "3003000000",
                    "本國語文相關": "3003001000",
                    "英美語文相關": "3003002000",
                    "日文相關科系": "3003003000",
                    "其他外國語文相關": "3003004000",
                    "語言學相關": "3003005000",
                    "歷史學相關": "3003006000",
                    "人類學相關": "3003007000",
                    "哲學相關": "3003008000",
                    "其他人文學相關": "3003009000"
                },
                "3004000000": {
//                    "經濟社會及心理學科類": "3004000000",
                    "經濟學相關": "3004001000",
                    "政治學相關": "3004002000",
                    "社會學相關": "3004003000",
                    "民族學相關": "3004004000",
                    "區域研究相關": "3004007000",
                    "其他經社心理相關": "3004008000"
                },
                "3005000000": {
//                    "法律學科類": "3005000000",
                    "法律相關科系": "3005001000"
                },
                "3006000000": {
//                    "商業及管理學科類": "3006000000",
                    "一般商業學類": "3006001000",
                    "文書管理相關": "3006002000",
                    "會計學相關": "3006003000",
                    "統計學相關": "3006004000",
                    "資訊管理相關": "3006005000",
                    "企業管理相關": "3006006000",
                    "工業管理相關": "3006007000",
                    "人力資源相關": "3006008000",
                    "市場行銷相關": "3006009000",
                    "國際貿易相關": "3006010000",
                    "財稅金融相關": "3006011000",
                    "銀行保險相關": "3006012000",
                    "公共行政相關": "3006013000",
                    "其他商業及管理相關": "3006014000"
                },
                "3007000000": {
//                    "自然科學學科類": "3007000000",
                    "生物學相關": "3007001000",
                    "化學相關": "3007002000",
                    "地質學相關": "3007003000",
                    "物理學相關": "3007004000",
                    "氣象學相關": "3007005000",
                    "海洋學相關": "3007006000",
                    "其他自然科學相關": "3007007000"
                },
                "3008000000": {
//                    "數學及電算機科學學科類": "3008000000",
                    "一般數學相關": "3008001000",
                    "數理統計相關": "3008002000",
                    "應用數學相關": "3008003000",
                    "資訊工程相關": "3008004000",
                    "其他數學及電算機科學相關": "3008005000"
                },
                "3009000000": {
//                    "醫藥衛生學科類": "3009000000",
                    "公共衛生相關": "3009001000",
                    "醫學系相關": "3009002000",
                    "中醫學系": "3009003000",
                    "復健醫學相關": "3009004000",
                    "護理助產相關": "3009005000",
                    "醫學技術及檢驗相關": "3009006000",
                    "牙醫學相關": "3009007000",
                    "藥學相關": "3009008000",
                    "醫藥工程相關": "3009009000",
                    "醫務管理相關": "3009010000",
                    "獸醫相關": "3009011000",
                    "其他醫藥衛生相關": "3009012000"
                },
                "3010000000": {
//                    "工業技藝及機械學科類": "3010000000",
                    "電機電子維護相關": "3010001000",
                    "金屬加工相關": "3010002000",
                    "機械維護相關": "3010003000",
                    "木工相關": "3010004000",
                    "冷凍空調相關": "3010005000",
                    "印刷相關": "3010006000",
                    "汽車汽修相關": "3010007000",
                    "其他工業技藝相關": "3010008000"
                },
                "3011000000": {
//                    "工程學科類": "3011000000",
                    "測量工程相關": "3011001000",
                    "工業設計相關": "3011002000",
                    "化學工程相關": "3011003000",
                    "材料工程相關": "3011004000",
                    "土木工程相關": "3011005000",
                    "環境工程相關": "3011006000",
                    "河海或船舶工程": "3011007000",
                    "電機電子工程相關": "3011008000",
                    "工業工程相關": "3011009000",
                    "礦冶工程相關": "3011010000",
                    "機械工程相關": "3011011000",
                    "航太工程相關": "3011012000",
                    "農業工程相關": "3011013000",
                    "紡織工程相關": "3011014000",
                    "核子工程相關": "3011015000",
                    "光電工程相關": "3011016000",
                    "其他工程相關": "3011017000"
                },
                "3012000000": {
//                    "建築及都市規劃學科類": "3012000000",
                    "建築相關": "3012001000",
                    "景觀設計相關": "3012002000",
                    "都巿規劃相關": "3012003000",
                    "其他建築及都市規劃學類": "3012004000"
                },
                "3013000000": {
//                    "農林漁牧學科類": "3013000000",
                    "農業相關": "3013001000",
                    "畜牧相關": "3013002000",
                    "園藝相關": "3013003000",
                    "植物保護相關": "3013004000",
                    "農業經濟相關": "3013005000",
                    "食品科學相關": "3013006000",
                    "水土保持相關": "3013007000",
                    "農業化學相關": "3013008000",
                    "林業相關": "3013009000",
                    "漁業相關": "3013010000",
                    "其他農林漁牧相關": "3013011000"
                },
                "3014000000": {
//                    "家政相關學科類": "3014000000",
                    "綜合家政相關": "3014001000",
                    "食品營養相關": "3014002000",
                    "兒童保育相關": "3014003000",
                    "服裝設計相關": "3014004000",
                    "美容美髮相關": "3014005000",
                    "其他家政相關": "3014006000"
                },
                "3015000000": {
//                    "運輸通信學科類": "3015000000",
                    "運輸管理相關": "3015001000",
                    "航空相關": "3015002000",
                    "航海相關": "3015003000",
                    "航運管理相關": "3015004000",
                    "通信學類": "3015005000",
                    "其他運輸通信相關": "3015006000"
                },
                "3016000000": {
//                    "觀光服務學科類": "3016000000",
                    "儀容服務學類": "3016001000",
                    "餐旅服務相關": "3016002000",
                    "觀光事務相關": "3016003000",
                    "其他觀光服務相關": "3016004000"
                },
                "3017000000": {
//                    "大眾傳播學科類": "3017000000",
                    "新聞學相關": "3017002000",
                    "廣播電視相關": "3017003000",
                    "公共關係相關": "3017004000",
                    "大眾傳播學相關": "3017001000",
                    "圖書管理相關": "3017005000",
                    "文物傳播相關": "3017006000",
                    "其他大眾傳播相關": "3017007000"
                },
                "3018000000": {
//                    "其他學科類": "3018000000",
                    "普通科": "3018001000",
                    "警政相關": "3018002000",
                    "軍事相關": "3018003000",
                    "體育相關": "3018004000",
                    "其他相關科系": "3018005000"
                }
            };
            var areaSelectValues = {
                "7001000000": {
                    "台灣": "7001053000",
                    "大陸": "7001001000",
                    "香港/澳門": "7001002000",
                    "日本": "7001003000",
                    "北韓": "7001004000",
                    "南韓": "7001005000",
                    "越南": "7001006000",
                    "寮國": "7001007000",
                    "柬埔寨": "7001008000",
                    "緬甸": "7001009000",
                    "泰國": "7001010000",
                    "馬來西亞": "7001011000",
                    "新加坡": "7001012000",
                    "菲律賓": "7001013000",
                    "汶萊": "7001014000",
                    "印尼": "7001015000",
                    "阿富汗": "7001016000",
                    "巴林": "7001017000",
                    "伊朗": "7001018000",
                    "伊拉克": "7001019000",
                    "以色列": "7001020000",
                    "約旦": "7001021000",
                    "科威特": "7001022000",
                    "黎巴嫩": "7001023000",
                    "阿曼": "7001024000",
                    "卡達": "7001025000",
                    "沙烏地阿拉伯": "7001026000",
                    "敘利亞": "7001027000",
                    "土耳其": "7001028000",
                    "阿拉伯大公國": "7001029000",
                    "葉門": "7001030000",
                    "孟加拉": "7001031000",
                    "不丹": "7001032000",
                    "印度": "7001033000",
                    "馬爾地夫": "7001034000",
                    "尼泊爾": "7001035000",
                    "巴基斯坦": "7001036000",
                    "斯里蘭卡": "7001037000",
                    "蒙古": "7001038000",
                    "俄羅斯": "7001039000",
                    "亞美尼亞": "7001040000",
                    "亞塞拜然": "7001041000",
                    "白俄羅斯": "7001042000",
                    "賽普勒斯": "7001043000",
                    "喬治亞": "7001044000",
                    "摩爾多瓦": "7001045000",
                    "烏克蘭": "7001046000",
                    "東帝汶": "7001047000",
                    "哈薩克": "7001048000",
                    "吉爾吉斯": "7001049000",
                    "塔吉克": "7001050000",
                    "土庫曼": "7001051000",
                    "烏茲別克": "7001052000"
                },
                "7002000000": {
                    "紐西蘭": "7002002000",
                    "巴布亞紐幾內亞": "7002003000",
                    "庫克群島": "7002004000",
                    "斐濟": "7002005000",
                    "吉里巴斯": "7002006000",
                    "馬爾地夫": "7002007000",
                    "馬紹爾群島": "7002008000",
                    "密克羅尼西亞": "7002009000",
                    "諾魯": "7002010000",
                    "紐埃": "7002011000",
                    "帛琉": "7002012000",
                    "薩摩亞": "7002013000",
                    "索羅門群島": "7002014000",
                    "東加": "7002015000",
                    "吐瓦魯": "7002016000",
                    "萬那杜": "7002017000"
                },
                "7003000000": {
                    "加拿大": "7003001000",
                    "美國": "7003002000",
                    "貝里斯": "7003003000",
                    "哥斯大黎加": "7003004000",
                    "薩爾瓦多": "7003005000",
                    "瓜地馬拉": "7003006000",
                    "宏都拉斯": "7003007000",
                    "尼加拉瓜": "7003008000",
                    "巴拿馬": "7003009000",
                    "烏拉圭": "7003010000",
                    "厄瓜多": "7003011000",
                    "哥倫比亞": "7003012000",
                    "巴拉圭": "7003013000",
                    "巴西": "7003014000",
                    "智利": "7003015000",
                    "玻利維亞": "7003016000",
                    "秘魯": "7003017000",
                    "蘇利南": "7003018000",
                    "阿根廷": "7003019000",
                    "墨西哥": "7003021000",
                    "多明尼加": "7003020000",
                    "委內瑞拉": "7003022000",
                    "古巴": "7003023000"
                },
                "7004000000": {
                    "挪威": "7004001000",
                    "瑞典": "7004002000",
                    "芬蘭": "7004003000",
                    "丹麥": "7004004000",
                    "冰島": "7004005000",
                    "阿爾巴尼亞": "7004006000",
                    "安道爾": "7004007000",
                    "波士尼亞赫塞哥維納": "7004008000",
                    "保加利亞": "7004009000",
                    "克羅埃西亞": "7004010000",
                    "賽普勒斯": "7004011000",
                    "希臘": "7004012000",
                    "義大利": "7004013000",
                    "馬其頓": "7004014000",
                    "馬爾他": "7004015000",
                    "葡萄牙": "7004016000",
                    "羅馬尼亞": "7004017000",
                    "聖馬利諾": "7004018000",
                    "塞爾維亞和黑山": "7004019000",
                    "斯洛維尼亞": "7004020000",
                    "西班牙": "7004021000",
                    "白俄羅斯": "7004022000",
                    "愛沙尼亞": "7004023000",
                    "拉脫維亞": "7004024000",
                    "立陶宛": "7004025000",
                    "摩爾多瓦": "7004026000",
                    "俄羅斯": "7004027000",
                    "烏克蘭": "7004028000",
                    "比利時": "7004029000",
                    "法國": "7004030000",
                    "愛爾蘭": "7004031000",
                    "盧森堡": "7004032000",
                    "摩納哥": "7004033000",
                    "荷蘭": "7004034000",
                    "英國": "7004035000",
                    "奧地利": "7004036000",
                    "捷克": "7004037000",
                    "德國": "7004038000",
                    "匈牙利": "7004039000",
                    "列支敦斯登": "7004040000",
                    "波蘭": "7004041000",
                    "斯洛伐克": "7004042000",
                    "瑞士": "7004043000"
                },
                "7005000000": {
                    "非洲": "7005000000",
                    "阿爾及利亞": "7005001000",
                    "埃及": "7005002000",
                    "利比亞": "7005003000",
                    "蘇丹": "7005004000",
                    "突尼西亞": "7005005000",
                    "西撒哈拉": "7005006000",
                    "摩洛哥": "7005007000",
                    "中非": "7005008000",
                    "喀麥隆": "7005009000",
                    "赤道幾內亞": "7005010000",
                    "加彭": "7005011000",
                    "剛果": "7005012000",
                    "剛果(金)": "7005013000",
                    "聖多美和普林西比": "7005014000",
                    "安哥拉": "7005015000",
                    "波札那": "7005016000",
                    "賴索托": "7005017000",
                    "馬達加斯加": "7005018000",
                    "馬拉威": "7005019000",
                    "模里西斯": "7005020000",
                    "莫三比克": "7005021000",
                    "納米比亞": "7005022000",
                    "史瓦濟蘭": "7005023000",
                    "南非": "7005024000",
                    "坦尚尼亞": "7005025000",
                    "尚比亞": "7005026000",
                    "辛巴威": "7005027000",
                    "留尼旺": "7005028000",
                    "聖赫倫那": "7005029000",
                    "衣索比亞": "7005030000",
                    "蒲隆地": "7005031000",
                    "厄利垂亞": "7005032000",
                    "吉布地": "7005033000",
                    "葛摩": "7005034000",
                    "肯亞": "7005035000",
                    "盧安達": "7005036000",
                    "塞席爾": "7005037000",
                    "索馬利亞": "7005038000",
                    "烏干達": "7005040000",
                    "貝南": "7005041000",
                    "布吉納法索": "7005042000",
                    "查德": "7005043000",
                    "多哥": "7005045000",
                    "維德角": "7005046000",
                    "甘比亞": "7005047000",
                    "幾內亞": "7005048000",
                    "幾內亞比索": "7005049000",
                    "迦納": "7005050000",
                    "象牙海岸": "7005053000",
                    "賴比瑞亞": "7005054000",
                    "馬利": "7005055000",
                    "尼日": "7005056000",
                    "奈及利亞": "7005057000",
                    "獅子山": "7005058000",
                    "塞內加爾": "7005059000"
                }
            };
            var $majorMainClass0 = $('select.majorMainClass[name="majorMainClass[0]"]');
            var $majorSubClass0 = $('select.majorSubClass[name="majorSubClass[0]"]');
            var $areaMainClass0 = $('select.eduMainArea[name="eduMainArea[0]"]');
            var $areaSubClass0 = $('select.eduSubArea[name="eduSubArea[0]"]');

            var $majorMainClass1 = $('select.majorMainClass[name="majorMainClass[1]"]');
            var $majorSubClass1 = $('select.majorSubClass[name="majorSubClass[1]"]');
            var $areaMainClass1 = $('select.eduMainArea[name="eduMainArea[1]"]');
            var $areaSubClass1 = $('select.eduSubArea[name="eduSubArea[1]"]');

            var $majorMainClass2 = $('select.majorMainClass[name="majorMainClass[2]"]');
            var $majorSubClass2 = $('select.majorSubClass[name="majorSubClass[2]"]');
            var $areaMainClass2 = $('select.eduMainArea[name="eduMainArea[2]"]');
            var $areaSubClass2 = $('select.eduSubArea[name="eduSubArea[2]"]');

            dynamicSelect($majorMainClass0, $majorSubClass0, majorSelectValues);
            dynamicSelect($areaMainClass0, $areaSubClass0, areaSelectValues);
            dynamicSelect($majorMainClass1, $majorSubClass1, majorSelectValues);
            dynamicSelect($areaMainClass1, $areaSubClass1, areaSelectValues);
            dynamicSelect($majorMainClass2, $majorSubClass2, majorSelectValues);
            dynamicSelect($areaMainClass2, $areaSubClass2, areaSelectValues);
        });

    </script>
@endsection



