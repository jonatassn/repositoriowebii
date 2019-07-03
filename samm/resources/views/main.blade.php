@extends('principal')

@section('script')

<script type="text/javascript" src="{{ url('/js/plugins/mask/jquery.mask.js') }}"></script>

<script type="text/javascript">

    // Função de abertura do arquivo
    function bs_input_file() {

        $(".input-file").before(
            function() {
                if ( ! $(this).prev().hasClass('input-ghost') ) {
                    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                    element.attr("name", $(this).attr("name"));
                    element.change(function(){
                        element.next(element).find('input').val((element.val()).split('\\').pop());
                    });
                    $(this).find("button.btn-choose").click(function(){
                        element.click();
                    });
                    $(this).find("button.btn-reset").click(function(){
                        element.val(null);
                        $(this).parents(".input-file").find('input').val('');
                    });
                    $(this).find('input').css("cursor","pointer");
                    $(this).find('input').mousedown(function() {
                        $(this).parents('.input-file').prev().click();
                        return false;
                    });
                    return element;
                }
            }
        );
    }

    $(function() {
        bs_input_file();
    });

    function mudaLabel(cbName, labelId) {
        var lb = labelId;
        var id = cbName;
        var cb = document.getElementById(id);
        if(cb.checked) {
            document.getElementById(lb).style.color = "green";
            document.getElementById(lb).textContent = "SIM";
        }
        else {
            document.getElementById(lb).style.color = "red";
            document.getElementById(lb).textContent = "NÃO";
        }
    }
    

</script>

@stop

@section('cabecalho')

    <div id="m_texto">
        <img src=" {{ url('/img/homep_ico.png') }}" >
        &nbsp;Menu Principal
    </div>
@stop

@section('conteudo')
    <div class='row'>

        <div class='col-sm-3' style="text-align: center">
            <a href="/resgistro">
                <img src="{{ url('/img/register.png') }}">
            </a>
            <h3> Registros </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <a href="/turma">
                <img src="{{ url('/img/register.png') }}">
            </a>
            <h3> Tags </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <a href="/aluno">
                <img src="{{ url('/img/register.png') }}">
            </a>
            <h3> Indivíduos </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <a href="/disciplina">
                <img src="{{ url('/img/register.png') }}">
            </a>
            <h3> Módulos </h3>
        </div>
    </div>
    <br>
    <div class='row'>
        <div class='col-sm-3' style="text-align: center">
            <a href="/conceito">
                <img src="{{ url('/img/register.png') }}">
            </a>
            <h3> Relatório </h3>
        </div>

    </div>
    <form >
        <h2>Carregar arquivo de Registros</h2>
        <div class="row">
            <br>
            <div class="col-sm-4 form-group">
                <div class="input-group input-file" name="arq_alunos">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-choose" type="button">Abrir Navegador</button>
                    </span>
                    <input type="text" class="form-control" placeholder='Nenhum arquivo selecionado...' />
                </div>
            </div>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary btn-block"><b>Carregar</b></button>
            </div>
        </div>
        <br>
    </form>
@stop
