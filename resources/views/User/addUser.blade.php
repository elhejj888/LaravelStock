@extends('sidebar')
@section('content')
<section >
 
 
     <section>
        <div>
            <div class="formbold-main-wrapper">
                <!-- Author: FormBold Team -->
                <!-- Learn More: https://formbold.com -->
                <div class="formbold-form-wrapper">                  
                  <form action="/adduser" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="formbold-form-title">
                      <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455" id="icon" class="bi bi-people" viewBox="0 0 16 16">
                          <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                      </svg>
                      </p>
                      <h2 class="">Ajouter Utilisateur</h2>
                    </div>
              
                    <div class="formbold-mb-3">
                        <label for="firstname" class="formbold-form-label">
                          Matricule
                        </label>
                        <input
                          type="text"
                          name="Matricule"
                          id="Matricule"
                          class="formbold-form-input"
                        />
                      </div>
                      
              
                    <div class="formbold-input-flex">
                      <div>
                        <label for="email" class="formbold-form-label"> Nom </label>
                        <input
                          type="text"
                          name="Nom"
                          id="Nom"
                          class="formbold-form-input"
                        />
                      </div>
                      <div>
                        <label for="phone" class="formbold-form-label"> Prenom </label>
                        <input
                          type="text"
                          name="Prenom"
                          id="Prenom"
                          class="formbold-form-input"
                        />
                      </div>
                    </div>
              
                    <div class="formbold-input-flex">
                      <div>
                        <label for="post" class="formbold-form-label"> Adresse electronique </label>
                        <input
                          type="email"
                          name="Email"
                          id="email"
                          class="formbold-form-input"
                        />
                      </div>
                      <div>
                        <label for="ville" class="formbold-form-label"> Extension </label>
                        <input
                          type="text"
                          name="Extension"
                          id="Extension"
                          class="formbold-form-input"
                        />
                      </div>
                    </div>
                    <div class="formbold-input-flex">
                      <div>
                        <label for="site" class="formbold-form-label"> Role </label>
                        <select id="Produit" class="formbold-form-input" name="Role" height="80px">
                            <option value="Autorisé">Autorisé</option>
                            <option value="Restreint">Restreint</option>
                            
                    </select>
                      </div>
                      <div>
                        <label for="site" class="formbold-form-label"> Service </label>
                        <input
                          type="text"
                          name="Service"
                          id="Service"
                          class="formbold-form-input"
                        />
                      </div>
                    </div>
                    <div class="formbold-input-flex">
                      <div>
                        <label for="site" class="formbold-form-label"> Site </label>
                        <select id="Produit" class="formbold-form-input" name="Site" height="80px">
                          <option value="Casablanca">Casablanca</option>
                          <option value="Oujda">Oujda</option>
                          
                  </select>
                      </div>
                      <div>
                        <label for="date" class="formbold-form-label" > Date d'embauche </label>
                        <input style="color: #019455;"
                          type="date"
                          name="DateEmbauche"
                          id="DateEmbauche"
                          class="formbold-form-input"
                        />
                      </div>
                        
                        
                    </div>
                      </label>
                      <button type="submit" class="formbold-btn">Ajouter Salarié(e)</button>
                    </div>
              
                  </form>
                </div>
              </div>
               <style>
                 @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
                 * {
                   margin: 0;
                   padding: 0;
                   box-sizing: border-box;
                 }
                 body {
                   font-family: 'Inter', sans-serif;
                 }
                 .formbold-mb-3 {
                   margin-bottom: 15px;
                 }
                 .formbold-relative {
                   position: relative;
                 }
                 .formbold-opacity-0 {
                   opacity: 0;
                 }
                 .formbold-stroke-current {
                   stroke: currentColor;
                 }
                 #supportCheckbox:checked ~ div span {
                   opacity: 1;
                 }
               
                 .formbold-main-wrapper {
                   display: flex;
                   align-items: center;
                   justify-content: center;
                   padding: 48px;
                 }
               
                 .formbold-form-wrapper {
                   margin: 0 auto;
                   max-width: 570px;
                   width: 100%;
                   background: white;
                   padding: 40px;
                 }
               
                 .formbold-img {
                   margin-bottom: 45px;
                 }
               
                 .formbold-form-title {
                   margin-bottom: 30px;
                 }
                 .formbold-form-title h2 {
                   font-weight: 600;
                   font-size: 28px;
                   line-height: 34px;
                   color: #019455;
                 }
                 .formbold-form-title p {
                   font-size: 16px;
                   line-height: 24px;
                   color: #019455;
                   margin-top: 12px;
                 }
               
                 .formbold-input-flex {
                   display: flex;
                   gap: 20px;
                   margin-bottom: 15px;
                 }
                 .formbold-input-flex > div {
                   width: 50%;
                 }
                 .formbold-form-input {
                   text-align: center;
                   width: 100%;
                   padding: 13px 22px;
                   border-radius: 5px;
                   border: 1px solid #dde3ec;
                   background: #ffffff;
                   font-weight: 500;
                   font-size: 16px;
                   color: #019455;
                   outline: none;
                   resize: none;
                 }
                 .formbold-form-input:focus {
                   border-color: #019455;
                   box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                 }
                 .formbold-form-label {
                   color: rgb(37, 36, 36);
                   font-size: 14px;
                   line-height: 24px;
                   display: block;
                   margin-bottom: 10px;
                 }
               
                 .formbold-checkbox-label {
                   display: flex;
                   cursor: pointer;
                   user-select: none;
                   font-size: 16px;
                   line-height: 24px;
                   color: #536387;
                 }
                 .formbold-checkbox-label a {
                   margin-left: 5px;
                   color: #019455;
                 }
                 .formbold-input-checkbox {
                   position: absolute;
                   width: 1px;
                   height: 1px;
                   padding: 0;
                   margin: -1px;
                   overflow: hidden;
                   clip: rect(0, 0, 0, 0);
                   white-space: nowrap;
                   border-width: 0;
                 }
                 .formbold-checkbox-inner {
                   display: flex;
                   align-items: center;
                   justify-content: center;
                   width: 20px;
                   height: 20px;
                   margin-right: 16px;
                   margin-top: 2px;
                   border: 0.7px solid #dde3ec;
                   border-radius: 3px;
                 }
               
                 .formbold-btn {
                   font-size: 20px;
                   border-radius: 5px;
                   padding: 14px 25px;
                   border: none;
                   font-weight: 600;
                   background-color: #019455;
                   color: white;
                   cursor: pointer;
                   margin-top: 25px;
                 }
                 .formbold-btn:hover {
                   box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                   background-color: #055b36;
                 }
               </style>
         </div>
     </section>
     
     
     <script src="{{asset('../../js/script.js')}}"></script>
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