<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="<?= URL ?>/home">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span> Adicionar Mídia</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= URL ?>/form-imagem">Adicionar Imagem</a></li>
                </ul>
            </li>


            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class=" fa fa-question"></i>
                    <span>Criar pergunta</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= URL ?>/form-pergunta-tato">Estimulo de ouvinte</a></li>
                    <li><a class="" href="<?= URL ?>/form-pergunta-ouvinte">Estimulo tato</a></li>

                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_puzzle_alt "></i>
                    <span> Criar Quiz</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= URL ?>/form-quiz">Criar Quiz</a></li>
                    <li><a class="" href="<?= URL ?>/form-add-pergunta-quiz">Adicionar pergunta quiz</a></li>
                    <li><a class="" href="<?= URL ?>/quiz">Quiz</a></li>
                </ul>
            </li>

            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-eye"></i>
                    <span>Ver Mídia</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= URL ?>/imagem">Imagem</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-eye"></i>
                    <span>Ver Pergunta</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= URL ?>/pergunta-tato">Pergunta Ouvinte</a></li>
                    <li><a class="" href="<?= URL ?>/pergunta-ouvinte">Pergunta Tato</a></li>

                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-gamepad"></i>
                    <span> Gerenciar Jogo</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= URL ?>/add-jogador-quiz">Add Jogador ao Quiz</a></li>
                </ul>
            </li>

            <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) { ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="fa fa-users"></i>
                        <span>Criar Equipe</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?= URL ?>/novo-grupo">Formulário Equipe</a></li>
                        <li><a class="" href="<?= URL ?>/form-controle-grupo">Controle da Equipe</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) { ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_group"></i>
                        <span>Usuários</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?= URL ?>/novo-usuario">Novo usuário</a></li>
                        <li><a class="" href="<?= URL ?>/controle-usuario">Controle de usuário</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) { ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_group"></i>
                        <span>Pacientes</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?= URL ?>/novo-paciente">Novo paciente</a></li>
                        <li><a class="" href="<?= URL ?>/paciente">Controle de pacientes</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>