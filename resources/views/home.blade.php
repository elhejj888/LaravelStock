
    <!-- Coding by CodingLab | www.codinglabweb.com -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!----======== CSS ======== -->
        <link rel="stylesheet" href="{{asset('../css/style.css')}}">
        
        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        
        <title>Dashboard Sidebar Menu</title> 
    </head>
    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                       <a href="/home"> <img src="{{asset('../img/logo1.png')}}" alt=""></a>
                    </span>
    
                    <div class="text logo-text">
                        <span class="name">ECA Assurance</span>
                        <span class="profession">Stock Manager</span>
                    </div>
                </div>
    
                <i class='bx bx-chevron-right toggle'></i>
            </header>
    
            <div class="menu-bar">
                <div class="menu">
                    <li class="nav-link">
                        <a href="/home">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" id="icon2"  class="bi bi-house-door" viewBox="0 0 16 16">
                                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                                  </svg>
                            </div>
                            <span class="text nav-text">&nbsp; Acceuil</span>
                        </a>
                    </li>
    
                    <ul class="menu-links">
                        <li class="search-box">
                            <a href="users">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                      </svg>  
                                </div>                 
                            <span class="text nav-text">&nbsp; Utilisateurs</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="materials">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-boxes"  viewBox="0 0 16 16">
                                        <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                                      </svg>        
                                      </div> 
                                <span class="text nav-text">&nbsp; Materiels</span>
                            </a>
                            
                        </li>
    
                        
    
                        <li class="nav-link">
                            <a href="#">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-clock-history" viewBox="0 0 16 16">
                                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                      </svg>
                                </div>
                                <span class="text nav-text">&nbsp; Historique</span>
                            </a>
                        </li>
                        @if(Auth::user()->Role === 'Admin')
                        <li class="nav-link">
                            <a href="#">
                                <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-wrench-adjustable-circle" viewBox="0 0 16 16">
                                    <path d="M12.496 8a4.491 4.491 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11c.027.2.04.403.04.61Z"/>
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-1 0a7 7 0 1 0-13.202 3.249l1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.49 4.49 0 0 1-1.592-.29L4.747 14.2A7 7 0 0 0 15 8Zm-8.295.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27.596-.894Z"/>
                                  </svg>
                                </div>
                                <span class="text nav-text">&nbsp; Reparation</span>
                            </a>
                        </li>
    
                        <li class="nav-link">
                            <a href="/trashCan">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" id="icon2" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                      </svg>
                                </div>                            
                                <span class="text nav-text">&nbsp; Mise en rebut</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
    
                <div class="bottom-content">
                    <li class="">
                        <a href="#" id="logout-link">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    
                        <script>
                            document.getElementById('logout-link').addEventListener('click', function(event) {
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            });
                        </script>
                    </li>
    
                    <li class="mode">
                        <div class="sun-moon">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Dark mode</span>
    
                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>
                    
                </div>
            </div>
    
        </nav>
    
        {{$rp=0;}}
        <section class="home">
            <div class="text">
                <table>
                    <tr class="row justify-content-center" > <!-- Use justify-content-center to center the row -->
                        <td class="first">
                            <div class="box" aria-label="groupe">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                </svg>
                                </a>
                            </div>
                            <div class="lab" style="display: flex;
                            justify-content: center;
                            align-items: center;
                            text-align: center;">
                                <table >
                                    <tr style="font-size: 12px">
                                        <th style="padding:4px; border-right:1px solid black">Admin</th>
                                        <th style="padding:4px; border-right:1px solid black">Salarié</th>
                                        <th style="padding:4px;">Départ</th>
                                    </tr>
                                    <tr>
                                        @foreach ($userCounts as $type => $Counts)
                                        <td style="font-size: 12px ; ">{{$Counts}}</td>
                                        @endforeach
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td class="first">
                            
                            <div class="box" aria-label="Display">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-display" viewBox="0 0 16 16">
                                    <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z"/>
                                  </svg>
                                </a>
                            </div>
                            <div  style="display: flex;
                            justify-content: center;
                            align-items: center;
                            text-align: center;">
                                    <table>
                                        <tr style="font-size: 11px">
                                            <th style="padding:4px; border-right:1px solid black">Disponible</th>
                                            <th style="padding:4px; border-right:1px solid black">Assigné</th>
                                            <th style="padding:4px; border-right:1px solid black">en Reparation</th>
                                            <th style="padding:4px; ">en rebut</th>
                                        </tr>
                                        <tr>
                                            @foreach ($materialCounts["Ecran"] as $value)
                                            <td style="font-size: 12px ; ">{{$value}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                            </div>
                        </td>
                        <td class="first">
                            <div>
                            <div class="box" aria-label="Ordinateur">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-pc" viewBox="0 0 16 16">
                                    <path d="M5 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H5Zm.5 14a.5.5 0 1 1 0 1 .5.5 0 0 1 0-1Zm2 0a.5.5 0 1 1 0 1 .5.5 0 0 1 0-1ZM5 1.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5ZM5.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1Z"/>
                                  </svg>
                                </a>
                            </div>
                            <div style="display: flex;
                            justify-content: center;
                            align-items: center;
                            text-align: center;">
                                    <table>
                                        <tr style="font-size: 11px">
                                            <th style="padding:4px; border-right:1px solid black">Disponible</th>
                                            <th style="padding:4px; border-right:1px solid black">Assigné</th>
                                            <th style="padding:4px; border-right:1px solid black">en Reparation</th>
                                            <th style="padding:4px; ">en rebut</th>
                                        </tr>
                                        <tr>
                                            @foreach ($materialCounts["Ordinateur"] as $value)
                                            <td style="font-size: 12px ; ">{{$value}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                            </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="row justify-content-center" > <!-- Use justify-content-center to center the row -->
                        
                        <td class="first">
                            <div class="box" aria-label="casque">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-headset" viewBox="0 0 16 16">
                                    <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z"/>
                                  </svg>
                                </a>
                            </div>
                            <div style="display: flex;
                            justify-content: center;
                            align-items: center;
                            text-align: center;">
                                    <table>
                                        <tr style="font-size: 11px">
                                            <th style="padding:4px; border-right:1px solid black">Disponible</th>
                                            <th style="padding:4px; border-right:1px solid black">Assigné</th>
                                            <th style="padding:4px; border-right:1px solid black">en Reparation</th>
                                            <th style="padding:4px; ">en rebut</th>
                                        </tr>
                                        <tr>
                                            @foreach ($materialCounts["Casque"] as $value)
                                            <td style="font-size: 12px ; ">{{$value}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                            </div>   
                        </td>
                        <td class="first" aria-label="telephone">
                            <div class="box">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                </a>
                                </div>
                                <div style="display: flex;
                            justify-content: center;
                            align-items: center;
                            text-align: center;">
                                    <table>
                                        <tr style="font-size: 11px">
                                            <th style="padding:4px; border-right:1px solid black">Disponible</th>
                                            <th style="padding:4px; border-right:1px solid black">Assigné</th>
                                            <th style="padding:4px; border-right:1px solid black">en Reparation</th>
                                            <th style="padding:4px; ">en rebut</th>
                                        </tr>
                                        <tr>
                                            @foreach ($materialCounts["Telephone"] as $value)
                                            <td style="font-size: 12px ; ">{{$value}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                            </div>
                        </td>
                        <td class="first">
                            <div class="box" aria-label="routeur">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" class="bi bi-globe2" viewBox="0 0 16 16">
                                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                                      </svg>
                                </a>
                            </div>
                            <div style="display: flex;
                            justify-content: center;
                            align-items: center;
                            text-align: center;">
                                    <table>
                                        <tr style="font-size: 11px">
                                            <th style="padding:4px; border-right:1px solid black">Disponible</th>
                                            <th style="padding:4px; border-right:1px solid black">Assigné</th>
                                            <th style="padding:4px; border-right:1px solid black">en Reparation</th>
                                            <th style="padding:4px; ">en rebut</th>
                                        </tr>
                                        <tr>
                                            @foreach ($materialCounts["Materiel reseau"] as $value)
                                            <td style="font-size: 12px ; ">{{$value}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                            </div>
                            </div>
                        </td>
                       
                        
                    </tr>
                    <tr class="row justify-content-center" > <!-- Use justify-content-center to center the row -->
                        
                        
                        <td class="first" style="display:none;">
                            <div class="box">
                                <a href="/trashCan">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                  </svg>
                                </a>
                            </div>
                            <div style="display: flex;
                            justify-content: center;
                            align-items: center;
                            text-align: center;">
                                    <table>
                                        <tr style="font-size: 11px">
                                            <th style="padding:4px; border-right:1px solid black">Utilisateurs</th>
                                            <th style="padding:4px; ">Materiels</th>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 12px ; ">{{$userCounts["Exclu"]}}</td>
                                            <td style="font-size: 12px ; ">{{$maintenanceCount}}</td>
                                        
                                        </tr>
                                    </table>
                                    
                            </div>
                        </td>
                     
                    </tr>
                   
                    
                    </table>
                    </table>
                   
            </div>
        </section>
        
    
        <script src="{{asset('../js/script.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      // When hovering over .box, also apply the hover effect to .box and .lab in the same table cell
      $(".box").hover(function () {
        $(this).parent().find(".box, .lab").addClass("hovered");
      }, function () {
        $(this).parent().find(".box, .lab").removeClass("hovered");
      });
    
      // When hovering over .lab, also apply the hover effect to .box and .lab in the same table cell
      $(".lab").hover(function () {
        $(this).parent().find(".box, .lab").addClass("hovered");
      }, function () {
        $(this).parent().find(".box, .lab").removeClass("hovered");
      });
    </script>
    
    <style>
      /* Apply a transition to the scale and opacity properties of .box and .lab when hovered */
      .hovered {
        transform: scale(1.2);
        opacity: 0.9;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
      }
    </style>
    
    
    
    </body>
    </html>