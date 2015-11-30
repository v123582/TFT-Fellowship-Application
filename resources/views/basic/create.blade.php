@extends('layouts._default')

@section('content')
    <div id="page">
        <div class="container">
            <form action="{{ url('basic') }}" method="post" name="dynamicForm" class="form-horizontal">
                {{csrf_field()}}
                <div class="row sectionTitle">
                    <h1>Basic Information</h1>
                </div>
                <div class="row">
                    <div class="sectionPan panel panel-default col-md-7 shadow">
                        <div class="panel-body">
                            <div class="form-group" onmouseover="displayExample('name')">
                                <label for="input" class="col-md-2 control-label">姓名</label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" placeholder="王大明"
                                           value="{{ Input::old('name') }}" required="required" maxlength="20">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('id_number')">
                                <label for="input" class="col-md-2 control-label">身分證字號</label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="id_number" placeholder="A123456789"
                                           value="{{ Input::old('id_number') }}" required="required"
                                           pattern="^[A-Z]{1}[1-2]{1}[0-9]{8}$">
                                    {{ $errors->first('id_number') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('sex')">
                                <label for="input" class="col-md-2 control-label">生理性別</label>

                                <div class="col-md-10">
                                    <div class="col-md-4">
                                        <input type="radio" name="sex" id="boy" value="1" required="required"> 男
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="sex" id="gril" value="2"> 女
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="sex" id="other" value="3"> 其他
                                    </div>
                                    {{ $errors->first('sex') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('birthday')">
                                <label for="input" class="col-md-2 control-label">生日</label>

                                <div class="col-md-10">
                                    <input type="text" name="birthday" class="form-control date" placeholder="1991/01/33"
                                        required="required" value="{{ Input::old('birthday') }}" />
                                    {{ $errors->first('birthday') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input" class="col-sm-2 control-label">室內電話</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" placeholder="0227386224"
                                           value="{{ Input::old('phone') }}" required="required">
                                    {{ $errors->first('phone') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('phone')">
                                <label for="input" class="col-sm-2 control-label">手機號碼</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cell_phone" placeholder="0912345678"
                                           required="required" value="{{ Input::old('cell_phone') }}">
                                    {{ $errors->first('cell_phone') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('skype')">
                                <label for="input" class="col-sm-2 control-label">Skype帳號</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="skype" placeholder="Skype"
                                           required="required" value="{{ Input::old('skype') }}">
                                    {{ $errors->first('skype') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('email')">
                                <label for="input" class="col-sm-2 control-label">主要電子郵件</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="tft@teach4taiwan.org"
                                        required="required" maxlength="30" value="{{ Input::old('email') }}">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('email')">
                                <label for="input" class="col-sm-2 control-label">備用電子郵件</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="sec_email"
                                           placeholder="tft@teach4taiwan.org" maxlength="30" value="{{ Input::old('sec_email') }}">
                                    {{ $errors->first('sec_email') }}
                                </div>
                            </div>
                            <div class="form-group" onmouseover="displayExample('address')">
                                <label for="input" class="col-sm-2 control-label">通訊地址</label>

                                <div class="col-sm-10">
                                    <div class="col-sm-12 form-inline" style="padding: 0px;">
                                        <div class='address'>
                                        </div>
                                    </div>       
                                    <div class="col-sm-12" style="padding: 0px;">                      
                                        <input type="address" class="form-control" name="address"
                                            placeholder="復興南路二段318號三樓" required="required" maxlength="50" value="{{ Input::old('address') }}">
                                        {{ $errors->first('address') }}
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('partials/_hint')
                </div>
            </form>
        </div>
    </div>

<script>
    function displayExample(dom) {
        var exampleHelpText = '...';
        var exampleText = '...';
        if (dom == 'name') {
            exampleHelpText = '請輸入你的姓名(2~20個字)';
            exampleText = '王大明';
        }
        if (dom == 'sex') {
            exampleHelpText = '請輸入你的生理性別(必填)';
            exampleText = '男，女，或其他';
        }
        if (dom == 'id_number') {
            exampleHelpText = '請輸入你的身分證字號(必填)';
            exampleText = 'A123456789';
        }
        if (dom == 'birthday') {
            exampleHelpText = '請輸入你的生日(必填)';
            exampleText = '1991/01/33';
        }
        if (dom == 'phone') {
            exampleHelpText = '請輸入室內電話(選填)';
            exampleText = '0224895094';
        }
        if (dom == 'cell_phone') {
            exampleHelpText = '請輸入你的手機';
            exampleText = '09XXXXXXXX';
        }
        if (dom == 'skype') {
            exampleHelpText = '請輸入你的 skype 帳號';
            exampleText = 'Skype ID';
        }
        if (dom == 'email') {
            exampleHelpText = '請輸入你的電子信箱';
            exampleText = 'E-mail address';
        }
        if (dom == 'sec_email') {
            exampleHelpText = '請輸入你的備用電子信箱(選填)';
            exampleText = 'E-mail address';
        }
        if (dom == 'address') {
            exampleHelpText = '請輸入你的地址';
            exampleText = '地址';
        }
        document.getElementById("exampleHelpText").innerHTML = exampleHelpText;
        document.getElementById("exampleText").innerHTML = exampleText;
    }

    $(function() {
        $(".date").datepicker();
        $(".address").twzipcode({
            'css': ['form-control', 'form-control', 'form-control'],
            'countyName'   : 'county',   // 預設值為 county
            'districtName' : 'district', // 預設值為 district
            'zipcodeName'  : 'zipcode',   // 預設值為 zipcode
            'zipcodeSel'  : '106', // 此參數會優先於 countySel, districtSel
            'countySel'   : '台北市',
            'districtSel' : '大安區'
        });
    });

</script>

@endsection



