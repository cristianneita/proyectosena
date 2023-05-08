<div class="content-wrapper">
<form method="post" action1 ="?c=ficha&a=FormListar">
        <div>
            <h1>Listado Fichas</h1>
        </div>
        <div><a class="btn btn-primary btn-flat" href="?c=ficha&a=FormCrear"><i class="fa fa-lg fa-plus"></li></a></div>
        
     
     <div class="row">
        <div class="col-md-12">
           <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                   <thead>
                       <tr>
                         <th>ID<th>
                         <th>#Ficha<th>
                         <th>Ambiente<th>
                         <th>Instructor<th>
                         <th>Jornada<th>
                         <th>Programa de Formación<th>
                       </tr>
                    </thead>
                    <tbody>
                <?php foreach($this->model->Listar() as $p):?>
                       <tr>
                         <td><?=$p->id?></td>
                         <td><?=$p->numeroficha?></td>
                         <td><?=$p->ambiente?></td>
                         <td><?=$p->instructor?></td>
                         <td><?=$p->Jornada?></td>
                         <td><?=$p->nombreprograma?></td>
                         <td>
                             
                            <a class="btn btn-info btn-flat" href="?c=ficha&a=FormCrear&Id=<?=$p->id_fichas?>"><i class="fa fa-lg fa-refresh"></li></a>

                            <a class="btn btn-warning btn-flat" href="?c=ficha&a=Borrar&Id=<?=$p->id_fichas?>"><i class="fa fa-lg fa-trash"></li></a>

                         </td>
                       </tr>
                <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>    
</div>