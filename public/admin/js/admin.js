$(document).ready(function() {
    // Config ckeditor
    CKEDITOR.replace('desc',{
        height: '800px',
        filebrowserBrowseUrl: 'public/admin/js/plugin/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: 'public/admin/js/plugin/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: 'public/admin/js/plugin/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: 'public/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: 'public/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: 'public/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });

});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/**
 * function delete a row in table
 * @param e
 * @param route
 */
function deleteCollection(id,model)
{
    $('.divMessageBox').removeClass('display-none');

    // if you click yes to delete
    $('#btn-yes-confirm').click(function () {
        $.ajax({
            type : 'DELETE',
            url : 'admin/'+ model +'/'+id,
            success: function (data) {
                $('.item-'+id).closest('tr').remove();
                $('.divMessageBox').addClass('display-none');
            }

        });
    });
}

/**
 * FUNCTION CHANGE STATUS
 */
function ajaxChangeStatus(id,model,message)
{
    // Set message
    if (message) {
        $('#msg-confirm').text(message);
    }

    // show form confirm
    $('.divMessageBox').removeClass('display-none');

    $('#btn-yes-confirm').click(function () {
        $.ajax({
            type : 'POST',
            url : 'admin/'+ model +'/' + id,
            success: function (response) {
                $('.divMessageBox').addClass('display-none');
            }

        });
    });
}

// check OR uncheck all permission
$('#select-all').click(function () {

    alert('dfs');
});


function clickDelete(id) {
    // call function delete category
    ajaxDeleteItemTable(id,'article');
}

function clickChangeStatus(id) {
    var model = 'article/changeStatus';
    var message = 'Are you sure change status of article ?';

    // call function change status
    ajaxChangeStatus(id,model,message);
}

// Initialize Object Tag
function Tag() {
    // property
    this.id = '';
    this.name = '';

    this.showInfo = function () {
        $('#old_name').val(this.name);
        $('#form-update-tag').attr("action", "admin/tag/"+this.id)
    };
}


function getTag(data) {

    var tag = new Tag();
    tag.id = data.id;
    tag.name = data.name;

    tag.showInfo();

}


/**
 * Initialize Object Tutorial
 * @constructor
 */
function Tutorial() {
    this.id = '';
    this.model = 'tutorial';
}

// delete tutorial
Tutorial.prototype.delete = function () {
    // call delete
    deleteCollection(this.id,this.model);
};

/**
 * Initialize Object Article
 * @constructor
 */
function Article() {
    this.id = '';
    this.category_id = '';
    this.model = '';

    this.delete = function () {
        deleteCollection(this.id, this.model)
    }

    this.loadTutorials =  function () {
        // send ajax
        $.ajax({
            url : 'admin/article/load-tutorial/'+this.category_id,
            type : 'GET',
            success: function (data) {
                var objTutorials = JSON.parse(data);
                var html = '<option value="0">NO.</option>';

                for (var i = 0 ; i < objTutorials.length; i++) {
                    html += '<option value="'+objTutorials[i]['id']+'">'+objTutorials[i]['name']+'</option>';
                }

                $('select[name="tutorial_id"]').html(html);
            }
        });
    };
}

function loadTutorials() {
    var category_id = $('select[name="category_id"]').val();
    var article = new Article();
    article.category_id = category_id;
    article.loadTutorials();
}

/**
 * Action click to delete collection
 * @param id
 * @param model
 */
function clickDelete(id,model) {
    deleteCollection(id, model);
}
