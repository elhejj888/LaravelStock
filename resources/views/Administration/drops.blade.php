@extends('sidebar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<section>
    <section>
        <div>
            <div class="formbold-main-wrapper">
                <div class="formbold-form-wrapper">
                  <div id="responseMessage"></div>
                        <div class="formbold-mb-3">
                            <label for="selectType" class="formbold-form-label">Choisir entre Materiel ou Utilisateur</label>
                            <select id="selectType" class="formbold-form-input" name="selectedType">
                              <option value=""></option>
                                <option value="materiel">Materiel</option>
                                <option value="utilisateur">Utilisateur</option>
                            </select>
                        </div>
                        <div id="dynamic-fields-container">
                            <!-- Dynamic fields will be added here based on the selected type -->
                        </div>
                        <!-- Rest of your form fields -->
                        <div class="formbold-checkbox-wrapper">
                            <label for="supportCheckbox" class="formbold-checkbox-label">
                                <!-- Checkbox label content -->
                            </label>
                            <button id="submitButton" class="formbold-btn" >Insérer </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- JavaScript to handle dynamic fields -->
<script>
    $(document).ready(function () {
        const selectType = $('#selectType');
        const dynamicFieldsContainer = $('#dynamic-fields-container');
        const saveButton = $('#submitButton');

        function createDynamicFields(selectedType) {
            dynamicFieldsContainer.empty();

            if (selectedType === 'materiel') {
                dynamicFieldsContainer.append(`
                    <div class="formbold-mb-3">
                        <label for="materielOptions" class="formbold-form-label">Choix de l'option</label>
                        <select class="formbold-form-input" name="materielOptions" id="materielOptions">
                            <option value=""></option>
                            <option value="type">Type de Produit</option>
                            <option value="marque">Marque</option>
                            <option value="choix">Option</option>
                            <option value="fournisseur">Fournisseur</option>
                            <option value="stock">Stock</option>
                            <option value="site">Site</option>
                        </select>
                    </div>
                `);
            } else if (selectedType === 'utilisateur') {
                dynamicFieldsContainer.append(`
                    <div class="formbold-mb-3">
                        <label for="userOptions" class="formbold-form-label">Choix de l'option</label>
                        <select class="formbold-form-input" name="userOptions" id="userOptions">
                            <option value=""></option>
                            <option value="service">Service</option>
                            <option value="site">Site</option>
                        </select>
                    </div>
                `);
            }
            
            // Add event listener for the selected option
            $('#materielOptions').on('change', function () {
                const selectedMaterielOption = $(this).val();
                handleMaterielOptionChange(selectedMaterielOption);
            });

            $('#userOptions').on('change', function () {
                const selectedUserOption = $(this).val();
                handleUserOptionChange(selectedUserOption);
            });
        }

        function handleMaterielOptionChange(selectedOption) {
            // Remove existing dynamic input fields, if any
            dynamicFieldsContainer.find('.dynamic-input').remove();

            // Handle each selected option
            if (selectedOption === 'type') {
                dynamicFieldsContainer.append(`
                    <div class="formbold-mb-3 dynamic-input">
                        <label for="typeInput" class="formbold-form-label">Type de Produit</label>
                        <input type="text" class="formbold-form-input" name="type" id="typeInput" required>
                    </div>
                `);
            } else if (selectedOption === 'marque') {
                dynamicFieldsContainer.append(`
                <div class="formbold-mb-3 dynamic-input">
                        <label for="marqueInput" class="formbold-form-label">choix de Produit</label>
                        <select class="formbold-form-input" name="type" id="typeInput" required>
                          <option value="" selected></option>
                                    <option value="Ordinateur">Ordinateur</option>
                                    <option value="Ecran">Ecran</option>
                                    <option value="Casque">Casque</option>
                                    <option value="Materiel Reseau">Materiel Reseau</option>
                                    <option value="Telephone">Téléphone</option>
                        </select>
                   </div>
                <div class="formbold-mb-3 dynamic-input">
                        <label for="marqueInput" class="formbold-form-label">Marque</label>
                        <input type="text" class="formbold-form-input" name="marque" id="marqueInput" required>
                    </div>
                    
                `);
            }
            else if (selectedOption === 'choix') {
                dynamicFieldsContainer.append(`
                <div class="formbold-mb-3 dynamic-input">
                        <label for="marqueInput" class="formbold-form-label">choix de Produit</label>
                        <select class="formbold-form-input" name="type" id="typeInput" required>
                          <option value="" selected></option>
                                    <option value="Ordinateur">Ordinateur</option>
                                    <option value="Ecran">Ecran</option>
                                    <option value="Casque">Casque</option>
                                    <option value="Materiel Reseau">Materiel Reseau</option>
                                    <option value="Telephone">Téléphone</option>
                        </select>
                   </div>
                    <div class="formbold-mb-3 dynamic-input">
                        <label for="choixInput" class="formbold-form-label">Option</label>
                        <input type="text" class="formbold-form-input" name="choix" id="choixInput" required>
                    </div>
                `);
            }
            else if (selectedOption === 'fournisseur') {
                dynamicFieldsContainer.append(`
                    <div class="formbold-mb-3 dynamic-input">
                        <label for="fournisseurInput" class="formbold-form-label">fournisseur</label>
                        <input type="text" class="formbold-form-input" name="fournisseur" id="fournisseurInput" required>
                    </div>
                `);
            }
            else if (selectedOption === 'stock') {
                dynamicFieldsContainer.append(`
                <div class="formbold-mb-3 dynamic-input">
                      <label for="area" class="formbold-form-label"> Site D'emplacement </label>
                            <select id="Produit" class="formbold-form-input" height="80px" name="site" id="siteInput" required>
                              <option value="Casablanca">Casablanca</option>
                              <option value="Oujda">Oujda</option>                              
                      </select>
                    </div>
                    <div class="formbold-mb-3 dynamic-input">
                        <label for="StockInput" class="formbold-form-label">Stock</label>
                        <input type="text" class="formbold-form-input" name="stock" id="stockInput" required>
                    </div>
                `);
            }
            else if (selectedOption === 'site') {
                dynamicFieldsContainer.append(`
                    <div class="formbold-mb-3 dynamic-input">
                        <label for="siteInput" class="formbold-form-label">Site</label>
                        <input type="text" class="formbold-form-input" name="site" id="siteInput" required>
                    </div>
                `);
            }
        }

        function handleUserOptionChange(selectedOption) {
            // Remove existing dynamic input fields, if any
            dynamicFieldsContainer.find('.dynamic-input').remove();

            // Handle each selected option
            if (selectedOption === 'service') {
                dynamicFieldsContainer.append(`
                <div class="formbold-mb-3 dynamic-input">
                      <label for="area" class="formbold-form-label"> Site D'emplacement </label>
                            <select class="formbold-form-input" height="80px" name="site" id="siteInput" required>
                              <option value="Casablanca">Casablanca</option>
                              <option value="Oujda">Oujda</option>                              
                      </select>
                    </div>
                    <div class="formbold-mb-3 dynamic-input">
                        <label for="serviceInput" class="formbold-form-label">Service</label>
                        <input type="text" class="formbold-form-input" name="service" id="serviceInput" required>
                    </div>
                `);
            }
            if (selectedOption === 'site') {
                dynamicFieldsContainer.append(`
                    <div class="formbold-mb-3 dynamic-input">
                        <label for="serviceInput" class="formbold-form-label">Site</label>
                        <input type="text" class="formbold-form-input" name="site" id="siteInput" required>
                    </div>
                `);
            }
        }
        
        selectType.on('change', function () {
            const selectedType = $(this).val();
            createDynamicFields(selectedType);
        });

        createDynamicFields(selectType.val());

        saveButton.on('click', function () {
            const selectedType = selectType.val();
            let data = {};

            if (selectedType === 'materiel') {
                data = 'materiel';
                
            } else if (selectedType === 'utilisateur') {
              data = 'user';

            }
            console.log(data);
            // Send data to Laravel backend using AJAX
            $.ajax({
                url: '{{ route('saveRoute') }}', // Replace with your Laravel route
                method: 'POST',
                data: {selected : data,
                    type: $('#typeInput').val(),
                    marque: $('#marqueInput').val(),
                    choix: $('#choixInput').val(),
                    fournisseur: $('#fournisseurInput').val(),
                    stock: $('#stockInput').val(),
                    site: $('#siteInput').val(),
                    service: $('#serviceInput').val(),
                _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                  $('#responseMessage').html('<p style="color:green;">Valeurs ajoutes avec Succes..!</p>');
                },
                error: function (error) {
                  $('#responseMessage').html('<p style="color:green;">Valeurs Non Ajoutes..!</p>');
                }
            });
        });

        selectType.on('change', function () {
            const selectedType = $(this).val();
            createDynamicFields(selectedType);
        });

        createDynamicFields(selectType.val());
    });

    
</script>

<script>
  $(document).ready(function() {
    var submitButton = $('#submitButton');
      $('#tag, #mac,#facture').on('keyup', function () {
          var tagValue = $('#tag').val();
          var macValue = $('#mac').val();
          var invoiceValue = $('#facture').val();

          $.ajax({
              url: '/check-duplicate2',
              method: 'POST',
              data: {
                  tag: tagValue,
                  mac: macValue,
                  facture: invoiceValue,
                  _token: '{{ csrf_token() }}'
              },
              success: function (response) {
                if (response.macExists || response.tagExists || response.invoiceExists) {
                      submitButton.prop('disabled', true);
                  } else {
                      submitButton.prop('disabled', false);
                  }

                  if (response.tagExists) {
                      $('#TagValidation').text('Tag Existe Deja.');
                  } else {
                      $('#TagValidation').text('');
                  }

                  if (response.macExists) {
                      $('#MacValidation').text('Adresse Mac Existe Deja.');
                  } else {
                      $('#MacValidation').text('');
                  }

                  if (response.invoiceExists) {
                      $('#InvoiceValidation').text('Code Facture Existe Deja.');
                  } else {
                      $('#InvoiceValidation').text('');
                  }

              }
          });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
      $select = document.getElementById("selectType").value;
      $materielOptions = document.getElementById("materielOptions").value;

      $type = document.getElementById("typeInput").value;
      $type2 = document.getElementById("materiels").value;

      $marque = document.getElementById("marqueInput").value;
      $choix = document.getElementById("choix").value;
      $marque = document.getElementById("fournisseur").value;
      $stock = document.getElementById("stock").value;
      $site = document.getElementById("site").value;

      $service = document.getElementById("service").value;
      $siteUser = document.getElementById("marqueInput").value;


      if ($value) {
          $('.mainData').hide();
          $('.searchData').show();
      } else {
          $('.mainData').show();
          $('.searchData').hide();
      }
      $.ajax({
          type: 'get',
          url: '{{ URL::to('searchMaterial') }}',
          data: {
              'search': $value
          },
          success: function(data) {
              console.log(data);
              $('#Content').html(data);
          }
      });
  })
</script>
@endsection
                  <style>
                    #submitButton[disabled] {
                    background-color: #ccc; /* Change to your desired color */
                    color: #666; /* Change to your desired color */
                    cursor: not-allowed;
                    }
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

  
    <style>
      /* Apply a transition to the scale and opacity properties of .box and .lab when hovered */
      .hovered {
        transform: scale(1.2);
        opacity: 0.9;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
      }
    </style>
    
    
    
   