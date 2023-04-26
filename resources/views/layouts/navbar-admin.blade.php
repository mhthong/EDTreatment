
  		<!-- NAVBAR -->
          <nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
            <a href="{{ url(env('APP_URL')) }}" target="_blank" >
                <i class="fa-solid fa-globe" hover:></i> {{-- Xem Trang Ngoài --}}
             </a>
			<input type="checkbox" id="switch-mode" hidden>

			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
            <a href="{{route('your-setting')}}" class="">
				<img class="img" src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->
