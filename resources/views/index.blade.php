
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
    
                    </ul>
                </div>
    
                <div class="bottom-content">
                    <li class="">
                        <a href="#">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
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
                                        <th style="padding:4px; border-right:1px solid black">Autorisé</th>
                                        <th style="padding:4px; border-right:1px solid black">Restreint</th>
                                        <th style="padding:4px;">Exclu</th>
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
                                            <th style="padding:4px; border-right:1px solid black">reparé</th>
                                            <th style="padding:4px; ">supprimé</th>
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
                                            <th style="padding:4px; border-right:1px solid black">reparé</th>
                                            <th style="padding:4px;">supprimé</th>
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
                                            <th style="padding:4px; border-right:1px solid black">reparé</th>
                                            <th style="padding:4px; ">supprimé</th>
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
                                            <th style="padding:4px; border-right:1px solid black">reparé</th>
                                            <th style="padding:4px; ">supprimé</th>
                                        </tr>
                                        <tr>
                                            @foreach ($materialCounts["Telephone"] as $value)
                                            <td style="font-size: 12px ; ">{{$value}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                            </div>
                        </td>
                       
                        
                    </tr>
                    <tr class="row justify-content-center" > <!-- Use justify-content-center to center the row -->
                        <td class="first">
                            <div class="box" aria-label="routeur">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-router" viewBox="0 0 16 16">
                                    <path d="M5.525 3.025a3.5 3.5 0 0 1 4.95 0 .5.5 0 1 0 .707-.707 4.5 4.5 0 0 0-6.364 0 .5.5 0 0 0 .707.707Z"/>
                                    <path d="M6.94 4.44a1.5 1.5 0 0 1 2.12 0 .5.5 0 0 0 .708-.708 2.5 2.5 0 0 0-3.536 0 .5.5 0 0 0 .707.707ZM2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm4.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm1.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Z"/>
                                    <path d="M2.974 2.342a.5.5 0 1 0-.948.316L3.806 8H1.5A1.5 1.5 0 0 0 0 9.5v2A1.5 1.5 0 0 0 1.5 13H2a.5.5 0 0 0 .5.5h2A.5.5 0 0 0 5 13h6a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5h.5a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 14.5 8h-2.306l1.78-5.342a.5.5 0 1 0-.948-.316L11.14 8H4.86L2.974 2.342ZM14.5 9a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h13Z"/>
                                    <path d="M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
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
                                            <th style="padding:4px; border-right:1px solid black">reparé</th>
                                            <th style="padding:4px; ">supprimé</th>
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
                        <td class="first">
                            <div class="box">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-house-gear" viewBox="0 0 16 16">
                                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                                    <path d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                                  </svg>
                                </a>
                                </div>
                                <div class="lab">
                                <a href="">Maintenance</a>
                            </div>
                        </td>
                        <td class="first">
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