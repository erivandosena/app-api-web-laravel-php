<footer class="footer text-muted">
    <div class="container-fluid">
        <div class="container">
            <p class="float-right"><a href="#">{{ __('Voltar ao topo') }}</a></p>
            <!--
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
            -->
            <p>
                <br />
            </p>
        </div>
        <div class="card text-center">
            <div class="card-footer text-muted">
            <span>Copyright © <a href="http://mildata.com.br" target="_blank">Mildata Tecnologia</a></span>
        </div>
    </div>
</footer>
<!-- Crud Modal Dialog -->

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="confirmDeleteLabel">Exclusão</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>
        <div class="modal-body">
            <p> Você está prestes a excluir <b><i class = "title"></i></b>, este procedimento é irreversível. </p>
            <p>Tem certeza que deseja executar esta ação?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger btn-ok" id="confirm">Confirmar</button>
        </div>
      </div>
    </div>
</div>

