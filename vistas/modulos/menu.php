<aside class="main-sidebar">
	 <section class="sidebar">
		<ul class="sidebar-menu">
		<?php
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Lider"){
			echo '<li class="active">
				<a href="inicio">
					<i class="fa fa-dashboard"></i>
					<span>Inicio</span>
				</a>
			</li>';
		}
		if($_SESSION["perfil"] == "Administrador"){
			echo '<li>
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>
			<li>
				<a href="centros">
					<i class="fa fa-institution"></i>
					<span>Centros</span>
				</a>
			</li>
			<li>
				<a href="programas">
					<i class="fa fa-th"></i>
					<span>Programas</span>
				</a>
			</li>
			<li>
				<a href="competencias">
					<i class="fa fa-list"></i>
					<span>Competencias</span>
				</a>
			</li>
			<li>
				<a href="pruebas">
					<i class="fa fa-product-hunt"></i>
					<span>Pruebas</span>
				</a>
			</li>
			<li>
				<a href="subcompetencias">
					<i class="fa fa-list-alt"></i>
					<span>Sub Competencias</span>
				</a>
			</li>
			<li>
				<a href="caracteristicas">
					<i class="fa fa-check-square-o"></i>
					<span>Caracteristicas</span>
				</a>
			</li>
			';
		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Lider"){
			echo '
			<li>
				<a href="modulos">
					<i class="fa fa-eye"></i>
					<span>Módulos</span>
				</a>
			</li>
			<li>
				<a href="subcomponentes">
					<i class="fa fa-sitemap"></i>
					<span>SubComponentes</span>
				</a>
			</li>
			
			<li>
				<a href="resultados">
					<i class="fa fa-tasks"></i>
					<span>Resultados</span>
				</a>
			</li>
			<li>
				<a href="mejoras">
					<i class="fa fa-pencil"></i>
					<span>Mejoras</span>
				</a>
			</li>
			<li>
				<a href="manual">
					<i class="fa fa-book"></i>
					<span>Manual</span>
				</a>
			</li>
			';
		}
		?>
		</ul>
	 </section>
</aside>