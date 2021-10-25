
//function biblioteca() {
//    {uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
//            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
//            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
//            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'    }
//}



$(document).ready(function () {
    $("#nivel").select2({
        placeholder: "Selecione um nível",
        allowClear: true
    });
});

$(document).ready(function () {
    $("#quest_op").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
});

$(document).ready(function () {
    $("#quest_assunto").select2({
        placeholder: "Selecione um assunto",
        allowClear: true
    });
});

$(document).ready(function () {
    $("#assun_disc").select2({
        placeholder: "Selecione uma disciplina",
        allowClear: true
    });
});

//$(document).ready(function () {
//    $('#editor1').ckeditor();
//});

function editor() {
    CKEDITOR.replace("ckeditor1", {
        uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
    CKEDITOR.replace("ckeditor2", {
        uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
    CKEDITOR.replace("ckeditor3", {
        uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
    CKEDITOR.replace("ckeditor4", {
        uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
    CKEDITOR.replace("ckeditor5", {
        uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
    CKEDITOR.replace("ckeditor6", {
        uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });

    CKEDITOR.replace("ckeditor7", {
        uploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
}

function limparCampos() {
    $('#form-quest').each(function () {
        CKEDITOR.instances.ckeditor1.setData('');
        CKEDITOR.instances.ckeditor2.setData('');
        CKEDITOR.instances.ckeditor3.setData('');
        CKEDITOR.instances.ckeditor4.setData('');
        CKEDITOR.instances.ckeditor5.setData('');
        CKEDITOR.instances.ckeditor6.setData('');
        document.getElementById("quest_assunto").options.length = 0;
        document.getElementById("quest_video").value = '';
        document.getElementById("quest_op").options.length = 0;
        CKEDITOR.instances.ckeditor7.setData('');
    });
}

function recuperarValores() {
    var dado = update.split("&");
    document.getElementById('id').value = dado[0];
    CKEDITOR.instances.ckeditor1.setData(dado[1]);
    document.getElementById('quest_op').value = dado[2];
    CKEDITOR.instances.ckeditor2.setData(dado[3]);
    CKEDITOR.instances.ckeditor3.setData(dado[4]);
    CKEDITOR.instances.ckeditor4.setData(dado[5]);
    CKEDITOR.instances.ckeditor5.setData(dado[6]);
    CKEDITOR.instances.ckeditor6.setData(dado[7]);
    document.getElementById('quest_video').value = dado[8];
    document.getElementById('quest_assunto').value = dado[9];
    CKEDITOR.instances.ckeditor7.setData(dado[10]);
}






