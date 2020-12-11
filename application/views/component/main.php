<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
<div class="container-xl">
  <a class="navbar-brand">system32</a>
  <ul class="nav nav-pills card-header-pills justify-content-end">
    <li class="nav-item">
      <a id="home" class="btn btn-primary btn-sm">Back</a>
    </li>&nbsp
    <li class="nav-item">
      <a id="add" class="btn btn-primary btn-sm">Add</a>
    </li>&nbsp
    <li class="nav-item">
      <a id="logout" class="btn btn-primary btn-sm">logout</a>
    </li>
  </ul>
</div>
</nav>

<div class="container-xl">
<div class="card">

  <div class="card-header" hidden>
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" id="tab1" href="#nav-home" role="tab" aria-selected="false">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" id="tab2" href="#nav-add" role="tab" aria-selected="false">Add</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" id="tab3" href="#nav-edit" role="tab" aria-selected="false">Edit</a>
      </li>
    </ul>
  </div>

  <div class="card-body">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" >
        <?php include "list.php"; ?>
      </div>
      <div class="tab-pane fade" id="nav-add" role="tabpanel" >
        <?php include "add.php"; ?>
      </div>
      <div class="tab-pane fade" id="nav-edit" role="tabpanel" >
        <?php include "edit.php"; ?>
      </div>
    </div>
  </div>
</div>
</div>
<input type="text" id="id_barang" value="" hidden>



<script>

<?php include "logic.js"; ?>

function edit_page(){
  $("#tab3").removeClass("disabled");
  $("#tab1").addClass("disabled");
  $("#tab2").addClass("disabled");
  $("#home").removeClass("hide");
  $("#add").addClass("hide");
  document.getElementById("tab3").click();
}

$("#home").addClass("hide");

$(document).ready(function(){
  $("#add").click(function(){
    clear();
    $("#tab2").removeClass("disabled");
    $("#tab1").addClass("disabled");
    $("#tab3").addClass("disabled");
    document.getElementById("tab2").click();
    $("#home").removeClass("hide");
    $("#add").addClass("hide");
  });
  $("#home").click(function(){
    tabledata.ajax.reload(null, false);
    $("#tab1").removeClass("disabled");
    $("#tab2").addClass("disabled");
    $("#tab3").addClass("disabled");
    $("#home").addClass("hide");
    $("#add").removeClass("hide");
    document.getElementById("tab1").click();
  });
  $("#logout").click(function(){
    location.href = "../logout";
  });
});

</script>
