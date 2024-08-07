function validation_users_form(){
    let condition = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#\_\-\{\}\(\)\[\]])[A-Za-z\d@$!%*?&#\_\-\{\}\(\)\[\]]{5,}$/;
    let password=$.trim($("#password").val());
    if($.trim($("#first_name").val())===""){
        $("#first_name_label").replaceWith('<label for="recipient-first_name" id="first_name_label" class="col-form-label" style="color:red">Escriba el nombre :</label>');
        $("#first_name").focus();
        return false;
    }else if($.trim($("#last_name").val())===""){
        $("#first_name_label").replaceWith('<label for="recipient-first_name" id="first_name_label" class="col-form-label">Nombre:</label>');
        $("#last_name_label").replaceWith('<label for="recipient-last_name" id="last_name_label" class="col-form-label" style="color:red">Escriba el apellido :</label>');
        $("#last_name").focus();
        return false;
    }else if($.trim($("#username").val())===""){
        $("#last_name_label").replaceWith('<label for="recipient-last_name" id="last_name_label" class="col-form-label">Apellido:</label>');
        $("#username_label").replaceWith('<label for="recipient-username" id="username_label" class="col-form-label" style="color:red">Escriba un nombre de usuario  :</label>');
        $("#username").focus();

        return false;
    }else if(password==="" || !condition.test(password)){
        $("#username_label").replaceWith('<label for="recipient-username" id="username_label" class="col-form-label">Usuario:</label>');
        $("#password_label").replaceWith('<label for="recipient-password" id="password_label" class="col-form-label" style="color:red">Escriba una contraseña valida con numeros y signos especiales  :</label>');
        $("#password").focus();
        return false;
    }
    $("#password_label").replaceWith('<label for="recipient-password" id="password_label" class="col-form-label">Contraseña:</label>');
    let data={
            'first_name': $("#first_name").val(),
            'last_name': $("#last_name").val(),
            'username': $("#username").val(),
            'password': $("#password").val(),
    }
    return data;
}

function save_users_form(module){
    $("#save").on('click', function(){
        let data=validation_users_form();
        if(data!=false){
            $.ajax(
                {
                method: "POST",
                url:module+"/Save/-1",
                dataType: 'json',
                data: data,
                minLength: 2,
                delay: 1,
                cache: false
                }).done(function(data){
                    console.log(data);
                    if(data.success===true){
                        $('#form').modal('hide')

                
                }
            });
        }
    });

}
function validation_budgets_form(){
    let condition = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#\_\-\{\}\(\)\[\]])[A-Za-z\d@$!%*?&#\_\-\{\}\(\)\[\]]{5,}$/;
    let password=$.trim($("#password").val());
    if($.trim($("#sucursal").val())==="0"){
        $("#sucursal_label").replaceWith('<label for="recipient-sucursal" id="sucursal_label" class="col-form-label" style="color:red">Selecciona la sucursal </label>');
        $("#sucursal").focus();
        return false;
    }else if($.trim($("#type").val())==="0"){
        $("#sucursal_label").replaceWith('<label for="recipient-sucursal" id="sucursal_label" class="col-form-label">Sucursal:</label>');
        $("#type_label").replaceWith('<label for="recipient-type" id="type_label" class="col-form-label" style="color:red">Selecciona el tipo de presupuesto</label>');
        $("#type").focus();
        return false;
    }else if($.trim($("#budget").val())==="" || $.trim($("#budget").val())==="0"){
        $("#type_label").replaceWith('<label for="recipient-type" id="type_label" class="col-form-label">Tipo de presupuesto:</label>');
        $("#budget_label").replaceWith('<label for="recipient-budget" id="budget_label" class="col-form-label" style="color:red">Escriba el monto del presupuesto </label>');
        $("#budget").focus();

        return false;
    }
    $("#budget_label").replaceWith('<label for="recipient-budget" id="budget_label" class="col-form-label">Presupuesto:</label>');
    let data={
            'sucursal': $("#sucursal").val(),
            'type': $("#type").val(),
            'month': $("#month").val(),
            'year': $("#year").val(),
            'budget': $("#budget").val()
    }
    return data;
}
function save_budgets_form(module){
    $("#save").on('click', function(){
        let data=validation_budgets_form();
        if(data!=false){
            $.ajax(
                {
                method: "POST",
                url:module+"/Save/-1",
                dataType: 'json',
                data: data,
                minLength: 2,
                delay: 1,
                cache: false
                }).done(function(data){
                    console.log(data);
                    if(data.success===true){
                        $('#form').modal('hide')

                
                }
            });
        }
    });

}
function get_report(){
    $("#do_report").on('click',function(){
        let choosed=$("#report_choose").val();
        let week=$("#week").val();
        if(choosed!=='0'){
            do_report({choosed:choosed,date:week});

        }else{
            $("#msjs").replaceWith(' <div class="title_interaction_bar" id="msjs">Selecciona un tipo de reporte!!!</div>');
        }
    });
    $("#report_choose").on('change',function(){
        $("#msjs").replaceWith(' <div class="title_interaction_bar" id="msjs"></div>');
    });
}

function do_report(data){
    let module=$("#module").val();
    let bar={title:'Generando reporte de '+$( "#report_choose option:selected" ).text(),txt:$( "#week option:selected" ).text(),proges:'0'}
    valu=0;
    const  myInterval=setInterval(function() { 
        
        valu++;
        if(valu<99){
            bar={title:'Generando reporte de '+$( "#report_choose option:selected" ).text(),txt:$( "#week option:selected" ).text(),proges:valu,state:'progress-bar-animated'}
            progress_bar(bar);
        }
    }, 1500);
    
  
    $.ajax({
        method: "POST",
        url:module+"/Get-Report/",
        data:data,
        dataType: 'json',
        minLength: 2,
        delay: 1,
        cache: false
        }).done(function(data){
            if(data.success){
                clearInterval(myInterval);
                let bar={title:'Reporte de '+$( "#report_choose option:selected" ).text()+' Listo',txt:$( "#week option:selected" ).text(),proges:'100',state:'bg-success'}
                progress_bar(bar);
                $("#result_report").css('display','block');
                $("#result_report").append('<h4>'+bar.title+'</h4>');
                $("#result_report").append(data.report);
            }

        });


}

function progress_bar(data={title:'',txt:'',proges:'0',state:'progress-bar-animated'}){
    $("#progress_bar").css('display','block');
    let tipo =$( "#report_choose option:selected" ).text();
    let fecha =$( "#week option:selected" ).text();
    $("#title_progres").replaceWith(' <h4 id="title_progres" >'+data.title+'</h4> ');
    $("#txt_progres").replaceWith('<p id="txt_progres">'+data.txt+'</p> ');
    $("#progress-bar").replaceWith('<div id="progress-bar" class="progress-bar progress-bar-striped '+data.state+'" role="progressbar" aria-valuenow="'+data.proges+'" aria-valuemin="0" aria-valuemax="100" style="width:'+data.proges+'%">'+data.proges+'%</div>');

    
}


function edit_budgets(){
    $('#form').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let recipient = button.data('whatever')
        let budget = recipient.split(" ");
        let budget_id = budget[budget.length - 1];
        if (!isNaN(budget_id) && !isNaN(parseFloat(budget_id))) {
            let budgetData = $("#"+budget_id).val();
            let budgetObject = JSON.parse(budgetData);
            for (let key in budgetObject) {
                if (budgetObject.hasOwnProperty(key)) {
                    $('#' + key).val(budgetObject[key]);
                }
            }

            console.log(budgetObject);
        } else {
            console.log(`${budget_id} no es un número.`);
        }

        console.log(budget_id);
    });





}