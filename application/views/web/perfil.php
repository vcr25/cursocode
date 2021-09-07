<?php $this->load->view('web/layout/navbar'); ?>


<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                
                <li class="active"><?php echo $titulo; ?></a></li>

            </ul>
        </div>
    </div>
</div>
 
 <!-- Begin Login Content Area -->
 <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">

                        <?php if($msg = $this->session->flashdata('sucesso')): ?>
                            <div class="alert alert-success bg-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                                </button>
                                <?php echo $msg; ?>
                            </div>
                            </div>
                        <?php endif; ?>

                        <?php if($msg = $this->session->flashdata('erro')): ?>
                            <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                                </button>
                                <?php echo $msg; ?>
                            </div>
                            </div>
                        <?php endif; ?>

                            <!-- Login Form s-->
                          <!--  <?php echo form_open('perfil'); ?>
                                <div class="login-form">
                                    <h4 class="login-title">Login</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Seu Email*</label>
                                            <input class="mb-0" type="email" name="email"  >
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Senha</label>
                                            <input class="mb-0" type="password" name="password" >
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" name="remember" id="remember_me">
                                                <label for="remember_me">Manter conectado</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="login" value="login">
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="<?php echo base_url('perfil'); ?>"> Criar uma Conta </a>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="register-button mt-0">Entrar</button>
                                        </div>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div> -->
                        <?php echo form_open('perfil'); ?>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 mt-3"> 
                       
                                <div class="login-form">
                                    <h4 class="login-title"><?php echo $titulo; ?></h4>
                                    <div class="form-group row">
                                        <div class="form-group col-md-3 col-12 mb-20">
                                            <label>Nome *</label>
                                            <input type="text" class="form-control" name="cliente_nome" value="<?php echo (isset($cliente) ? $cliente->cliente_nome : set_value('cliente_nome')); ?>" >
                                            <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 col-12 mb-20">
                                            <label>Sobrenome *</label>
                                            <input type="text" class="form-control" name="cliente_sobrenome" value="<?php echo (isset($cliente) ? $cliente->cliente_sobrenome : set_value('cliente_sobrenome'));?>" >
                                            <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class=" form-group col-md-3 mb-20">
                                            <label>Data de Nascimento *</label>
                                            <input type="date" class="form-control  " name="cliente_data_nascimento"  value="<?php echo (isset($cliente) ? $cliente->cliente_data_nascimento : formata_data_banco_sem_hora (set_value('cliente_data_nascimento')));?>" >
                                            <?php echo form_error('cliente_data_nascimento', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class=" form-group col-md-3 mb-20">
                                            <label>CPF *</label>
                                            <input type="text" class="form-control cpf"  name="cliente_cpf"  value="<?php echo (isset($cliente) ? $cliente->cliente_cpf : set_value('cliente_cpf')); ?>" >
                                            <?php echo form_error('cliente_cpf', '<div class="text-danger">', '</div>'); ?>
                                        </div>

                                        <div class="form-group col-md-3 mb-20">
                                            <label>Telefone Fixo </label>
                                            <input type="text" class="form-control sp_celphones" name="cliente_telefone_fixo"  value="<?php echo (isset($cliente) ? $cliente->cliente_telefone_fixo : set_value('cliente_telefone_fixo')); ?>" >
                                            <?php echo form_error('cliente_telefone_fixo', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Telefone Movel *</label>
                                            <input type="text" class="form-control sp_celphones" name="cliente_telefone_movel"  value="<?php echo (isset($cliente) ? $cliente->cliente_telefone_movel : set_value('cliente_telefone_movel')); ?>" >
                                            <?php echo form_error('cliente_telefone_movel', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>CEP *</label>
                                            <input type="text" class="form-control cep" name="cliente_cep"  value="<?php echo (isset($cliente) ? $cliente->cliente_cep : set_value('cliente_cep')); ?>" >
                                            <?php echo form_error('cliente_cep', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Logradouro *</label>
                                            <input type="text" class="form-control" name="cliente_endereco"  value="<?php echo (isset($cliente) ? $cliente->cliente_endereco : set_value('cliente_endereco')); ?>" >
                                            <?php echo form_error('cliente_endereco', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Número *</label>
                                            <input type="text" class="form-control" name="cliente_numero_endereco"  value="<?php echo (isset($cliente) ? $cliente->cliente_numero_endereco : set_value('cliente_numero_endereco')); ?>" >
                                            <?php echo form_error('cliente_numero_endereco', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Bairro *</label>
                                            <input type="text" class="form-control" name="cliente_bairro"  value="<?php echo (isset($cliente) ? $cliente->cliente_bairro : set_value('cliente_bairro')); ?>" >
                                            <?php echo form_error('cliente_bairro', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Cidade *</label>
                                            <input type="text" class="form-control" name="cliente_cidade"  value="<?php echo (isset($cliente) ? $cliente->cliente_cidade : set_value('cliente_cidade')); ?>" >
                                            <?php echo form_error('cliente_cidade', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Complemento</label>
                                            <input type="text" class="form-control" name="cliente_complemento"  value="<?php echo (isset($cliente) ? $cliente->cliente_complemento : set_value('cliente_complemento')); ?>" >
                                            <?php echo form_error('cliente_complemento', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3  mb-20">
                                            <div class="country-select  clearfix">
                                            <label>Estado *</label>
                                            <?php if(isset ($cliente)): ?>

                                            <select class="custom-select" name="cliente_estado">
                                            <option value="">Escolha...</option>
                                            <option value="AC" <?php echo ($cliente->cliente_estado == 'AC' ? 'selected' : '') ?>>Acre</option>
                                            <option value="AL" <?php echo ($cliente->cliente_estado == 'AL' ? 'selected' : '') ?>>Alagoas</option>
                                            <option value="AP" <?php echo ($cliente->cliente_estado == 'AP' ? 'selected' : '') ?>>Amapá</option>
                                            <option value="AM" <?php echo ($cliente->cliente_estado == 'AM' ? 'selected' : '') ?>>Amazonas</option>
                                            <option value="BA" <?php echo ($cliente->cliente_estado == 'BA' ? 'selected' : '') ?>>Bahia</option>
                                            <option value="CE" <?php echo ($cliente->cliente_estado == 'CE' ? 'selected' : '') ?>>Ceará</option>
                                            <option value="DF" <?php echo ($cliente->cliente_estado == 'DF' ? 'selected' : '') ?>>Distrito Federal</option>
                                            <option value="ES" <?php echo ($cliente->cliente_estado == 'ES' ? 'selected' : '') ?>>Espírito Santo</option>
                                            <option value="GO" <?php echo ($cliente->cliente_estado == 'GO' ? 'selected' : '') ?>>Goiás</option>
                                            <option value="MA" <?php echo ($cliente->cliente_estado == 'MA' ? 'selected' : '') ?>>Maranhão</option>
                                            <option value="MT" <?php echo ($cliente->cliente_estado == 'MT' ? 'selected' : '') ?>>Mato Grosso</option>
                                            <option value="MS" <?php echo ($cliente->cliente_estado == 'MS' ? 'selected' : '') ?>>Mato Grosso do Sul</option>
                                            <option value="MG" <?php echo ($cliente->cliente_estado == 'MG' ? 'selected' : '') ?>>Minas Gerais</option>
                                            <option value="PA" <?php echo ($cliente->cliente_estado == 'PA' ? 'selected' : '') ?>>Pará</option>
                                            <option value="PB" <?php echo ($cliente->cliente_estado == 'PB' ? 'selected' : '') ?>>Paraíba</option>
                                            <option value="PR" <?php echo ($cliente->cliente_estado == 'PR' ? 'selected' : '') ?>>Paraná</option>
                                            <option value="PE" <?php echo ($cliente->cliente_estado == 'PE' ? 'selected' : '') ?>>Pernambuco</option>
                                            <option value="PI" <?php echo ($cliente->cliente_estado == 'PI' ? 'selected' : '') ?>>Piauí</option>
                                            <option value="RJ" <?php echo ($cliente->cliente_estado == 'RJ' ? 'selected' : '') ?>>Rio de Janeiro</option>
                                            <option value="RN" <?php echo ($cliente->cliente_estado == 'RN' ? 'selected' : '') ?>>Rio Grande do Norte</option>
                                            <option value="RS" <?php echo ($cliente->cliente_estado == 'RS' ? 'selected' : '') ?>>Rio Grande do Sul</option>
                                            <option value="RO" <?php echo ($cliente->cliente_estado == 'RO' ? 'selected' : '') ?>>Rondônia</option>
                                            <option value="RR" <?php echo ($cliente->cliente_estado == 'RR' ? 'selected' : '') ?>>Roraima</option>
                                            <option value="SC" <?php echo ($cliente->cliente_estado == 'SC' ? 'selected' : '') ?>>Santa Catarina</option>
                                            <option value="SP" <?php echo ($cliente->cliente_estado == 'SP' ? 'selected' : '') ?>>São Paulo</option>
                                            <option value="SE" <?php echo ($cliente->cliente_estado == 'SE' ? 'selected' : '') ?>>Sergipe</option>
                                            <option value="TO" <?php echo ($cliente->cliente_estado == 'TO' ? 'selected' : '') ?>>Tocantins</option>
                                            </select>

                                            <?php else: ?>

                                            <select class="custom-select" name="cliente_estado">
                                            <option value="">Escolha...</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option  value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                            </select>

                                            <?php endif; ?>
                                            <?php echo form_error('cliente_estado', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-20">
                                            <label>Email *</label>
                                            <input type="email" class="form-control"  name="cliente_email" value="<?php echo (isset($cliente) ? $cliente->cliente_email : set_value('cliente_email')); ?>" >
                                            <?php echo form_error('cliente_email', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Senha *</label>
                                            <input type="password" class="form-control" name="password" id="inputPassword4" >
                                            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-3 mb-20">
                                            <label>Confirmar Senha *</label>
                                            <input type="password" class="form-control" name="confirma" id="inputPassword5" >
                                            <?php echo form_error('confirma', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-row">

                                        <?php if(isset($cliente)) : ?>
                                        <input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id; ?>">
                                        <?php endif; ?>

                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="register-button mt-0">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                              
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->