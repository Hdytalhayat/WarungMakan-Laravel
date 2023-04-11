@extends('layouts.frontend')

@section('title')
    Chatbot
@endsection

@section('css')
    <style>
        .wrapper1{
    width: 370px;
    background: #fff;
    border-radius: 5px;
    border: 1px solid lightgrey;
    border-top: 0px;
}
.wrapper1 .title{
    background: #3b5d50;
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    line-height: 60px;
    text-align: center;
    border-bottom: 1px solid #3b5d50;
    border-radius: 5px 5px 0 0;
}
.wrapper1 .form{
    padding: 20px 15px;
    min-height: 400px;
    max-height: 400px;
    overflow-y: auto;
}
.wrapper1 .form .inbox{
    width: 100%;
    display: flex;
    align-items: baseline;
}
.wrapper1 .form .user-inbox{
    justify-content: flex-end;
    margin: 13px 0;
}
.wrapper1 .form .inbox .icon{
    height: 40px;
    width: 40px;
    color: #fff;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    font-size: 18px;
    background: #3b5d50;
}
.wrapper1 .form .inbox .msg-header{
    max-width: 53%;
    margin-left: 10px;
}
.form .inbox .msg-header p{
    color: #fff;
    background: #3b5d50;
    border-radius: 10px;
    padding: 8px 10px;
    font-size: 14px;
    word-break: break-all;
}
.form .user-inbox .msg-header p{
    color: #333;
    background: #efefef;
}
.wrapper1 .typing-field{
    display: flex;
    height: 60px;
    width: 100%;
    align-items: center;
    justify-content: space-evenly;
    background: #efefef;
    border-top: 1px solid #d9d9d9;
    border-radius: 0 0 5px 5px;
}
.wrapper1 .typing-field .input-data{
    height: 40px;
    width: 335px;
    position: relative;
}
.wrapper1 .typing-field .input-data input{
    height: 100%;
    width: 100%;
    outline: none;
    border: 1px solid transparent;
    padding: 0 80px 0 15px;
    border-radius: 3px;
    font-size: 15px;
    background: #fff;
    transition: all 0.3s ease;
}
.typing-field .input-data input:focus{
    border-color: #3b5d50;
}
.input-data input::placeholder{
    color: #999999;
    transition: all 0.3s ease;
}
.input-data input:focus::placeholder{
    color: #bfbfbf;
}
.wrapper1 .typing-field .input-data button{
    position: absolute;
    right: 5px;
    top: 50%;
    height: 30px;
    width: 65px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    opacity: 0;
    pointer-events: none;
    border-radius: 3px;
    background: #3b5d50;
    border: 1px solid #3b5d50;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}
.wrapper1 .typing-field .input-data input:valid ~ button{
    opacity: 1;
    pointer-events: auto;
}
.typing-field .input-data button:hover{
    background: #3b5d50;
}
    </style>
@endsection

@section('content')


<div class="container pb-5 mt-3 ">
    <div class="row">
        <div class="col">
            
        </div>
        <div class="col">
            <div class="card shadow mb-5 text-start" style="width: auto;">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="wrapper1">
                                <div class="title">ChatBot sederhana</div>
                                <div class="form">
                                    <div class="bot-inbox inbox">
                                        <div class="icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="msg-header">
                                            <p>Hai, ada yang bisa kami bantu?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="typing-field">
                                    <div class="input-data">
                                        <input name="sender" class="sender" id="sender" type="text" placeholder="Ketikan sesuatu.." required>
                                        <button id="send-btn">Kirim</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
        </div>
      </div>
    

</div>                  


@endsection
