<!-- Navbar-->
<header class="app-header">
	<a class="app-header__logo" href="{{ route('home') }}">LMS</a>
	<!-- Sidebar toggle button-->
	<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
	<!-- Navbar Right Menu-->
	<ul class="app-nav">
		<li class="app-search">
			<input class="app-search__input" type="search" placeholder="Search">
			<button class="app-search__button">
				<i class="fa fa-search"></i>
			</button>
		</li>
		<!--Notification Menu-->
		<li class="dropdown">

			<a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
				<i class="fa fa-bell fa-lg"></i>
			</a>
			<ul class="app-notification dropdown-menu dropdown-menu-right">
				<li class="app-notification__title">Notifications</li>
				<div class="app-notification__content">
					
					{{-- notification --}}
					<li>
						<a class="app-notification__item" href="{{ route('messagesAdmin.index') }}">
							<span class="app-notification__icon">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x text-primary"></i>
									<i class="fa fa-bell fa-stack-1x fa-inverse text-warning"></i>
								</span>
							</span>
							<div>
								<p class="app-notification__message">{{  auth()->user()->unreadNotifications->count() }} notification(s)</p>
								<p class="app-notification__meta"> non lus </p>
							</div>
						</a>
					</li>
					{{-- notification --}}
					<div class="app-notification__content">
						<li>
							<a class="app-notification__item" href="javascript:;">
								<span class="app-notification__icon">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
									</span>
								</span>
								<div>
									<p class="app-notification__message">Lisa sent you a mail</p>
									<p class="app-notification__meta">2 min ago</p>
								</div>
							</a>
						</li>
						<li>
							<a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
								<div>
									<p class="app-notification__message">Mail server not working</p>
									<p class="app-notification__meta">5 min ago</p>
								</div>
							</a>
						</li>
						<li>
							<a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
								<div>
									<p class="app-notification__message">Transaction complete</p>
									<p class="app-notification__meta">2 days ago</p>
								</div>
							</a>
						</li>
					</div>
				</div>
				<li class="app-notification__footer"><a href="#">See all notifications.</a></li>
			</ul>
		</li>
		<!--
			 User Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
			
			<ul class="dropdown-menu settings-menu dropdown-menu-right">
				<li><a class="dropdown-item" href="{{ route('mdp') }}"><i class="fa fa-key fa-lg"></i> Mot de passe</a></li>
				<li><a class="dropdown-item" href="{{ route('profil') }}"><i class="fa fa-cog fa-lg"></i> Paramètres</a></li>

				<li>
					<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">

					<i class="fa fa-sign-out fa-lg"></i> {{ __('Déconnexion') }}</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>
			</ul>
		</li>
	</ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" 
		src="{{ asset(Auth::user()->avatar) }}"  alt="User Image" height="50px">
		<div>
			<p class="app-sidebar__user-name">{{ Auth::user()->prenom }}</p>
			<p class="app-sidebar__user-designation">Etudiants</p>
		</div>
	</div>
	<ul class="app-menu">

		<li><a class="app-menu__item {{ is_active($active1, 'dashboard') }}" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tableau de bord</span></a></li>
		
		<li class="treeview {{ is_expend($active1, 'users') }}">
			<a class="app-menu__item" href="#" data-toggle="treeview">
				<i class="app-menu__icon fa fa-window-maximize fa-lg"></i>
				<span class="app-menu__label">Gestion des Cours </span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="{{ route('student.courses.list') }}">
					<i class="icon fa fa-file-zip-o"></i>Cours disponible</a></li>
				<li><a class="treeview-item" href="{{ route('student.course_suivi') }}">
					<i class="icon fa fa-file-powerpoint-o"></i>Vos Cours Suivi </a></li>
			
				<li><a class="treeview-item" href="{{ route('student.quiz.index') }}">
							<i class="icon fa fa-question-circle"></i>Quiz</a></li>
			</ul>
		</li>
		
		
		<li><a class="app-menu__item {{ is_active($active1, 'Forum') }}" href="{{ route('student.forum') }}"><i class="app-menu__icon fa fa-comments "></i><span class="app-menu__label"> Forum</span></a>
		</li>
		
		<li><a class="app-menu__item {{ is_active($active1, 'notification') }}" href="{{ route('messageStudent.index') }}"><i class="app-menu__icon fa fa-bell fa-lg"></i><span class="app-menu__label">Notification</span></a>
		</li>
		
		

		


	</ul>
</aside>