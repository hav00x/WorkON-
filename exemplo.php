<!-- Modal Edição Projetos -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="" method="post">
            <div class="modal-header" style="margin-left: 20px; padding-bottom: 0;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 class="modal-title">
                <div>

                  <span id="nome-projetoupd">Novo Projeto</span>
                  <button style="display: inline-block; margin-bottom: 10px;" type="button" id="edita-projeto" class="btn-edicao">
                    <img class="img-edicao" src="img/edit-file.png">
                  </button>
                  <input id="nomeprojupd" type="text" name="nome_projetoupd" style="display: none;">
                </div>
              </h3>
            </div>

            <div class="modal-body">
              <div class="col-left">
                <label for="nomecli">Nome do Cliente/Empresa</label>
                <input type="text" class="text_field" id="nomecliupd" name="nomecliupd">
              </div>
              <div class="col-right">
                <label for="tipopro">Tipo de Projeto</label>
                <input type="text" class="text_field" id="tipoproupd" name="tipoproupd">
              </div>
              <div class="col-cent">
                <label for="descri">Descrição do Projeto</label>
                <textarea id="descriupd" maxlength="254" class="text_field" name="descriproupd"></textarea>
              </div>
              <div class="col-left">
                <label for="dataini">Data Início</label>
                <input type="date" class="text_field" id="datainiupd" min="<?='1980-01-01'?>" max="<?='2038-01-19'?>" name="datainiupd">
              </div>
              <div class="col-right">
                <label for="dataent">Data Entrega</label>
                <input type="date" class="text_field" id="dataentupd" min="<?=date('Y-m-d')?>" max="<?='2038-01-19'?>" name="datatermupd">
              </div>
              <div class="col-md-offset-4 col-md-4 input-icon">
                <label for="precoest">Preço Estabelecido</label>
                <input type="text" max="999999999" class="text_field" id="precoestupd" name="precoestupd"><i>R$</i>
              </div>
              <div class="col-md-12">
                <h3>O que vai ser feito?</h3>
                <p>Nesta seção, você deve informar tudo o que irá ser feito no projeto. Essas informações podem ser separadas por etapas para ajudar o cliente a saber o que irá ser feito e em que ordem será executado.</p>
              </div>
              <div class="col-md-12">
                <div class="panel-group" id="accordionupd" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading1upd">
                      <h4 class="panel-title">
                        <div>
                          <a class="nome-etapa" role="button" data-toggle="collapse" data-parent="#accordionupd" href="#collapseupdZ1" aria-expanded="true" data-value="1" aria-controls="collapseupdZ1" id="nome-etapa1upd">Etapa #1</a>
                          <button type="button" id="edita-etapa1upd" class="btn-edicao edita-txt">
                            <img class="img-etapa-edicao" src="img/edit-file.png">
                          </button>
                          <input class="nomeetp" id="input-etapa1upd" type="text" name="nome_etapaupd[1]" style="display: none;">
                        </div>
                      </h4>
                    </div>
                    <div id="collapseupdZ1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                      <div id='acordion1upd' class="acordion-st row">
                        <div class="col-md-4">
                          <label data-value='1.1'>Atividade #1 </label>
                          <input type="text" name="campoupd[1][1]">
                        </div>
                        <button type="button" id="btnc1" class="btn-edicao add-passo" style="float: right;">
                          <img class="img-edicao" src="img/add-circular-button.png">
                        </button>
                        <button type="button" id="btnr1" class="btn-edicao rmv-passo" style="float: right;">
                          <img class="img-edicao" src="img/minus.png">
                        </button>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="button -regular" id="add-etapa" style="float: right;">Mais etapas
                  </button>
                  <button type="button" class="button -regular" id="rmv-etapa" style="float: right;">Menos etapas
                  </button>
                </div>
              </div>

            </div>

            <div class="modal-footer" style="clear: both;">
              <button type="button" class="button -regular" data-dismiss="modal">Voltar</button>
              <button type="submit" class="button -regular">Criar</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- Fim Modal -->