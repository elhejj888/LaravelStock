@extends('sidebar')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <section>


        <section>
            <div>
                <div class="formbold-main-wrapper">
                    <!-- Author: FormBold Team -->
                    <!-- Learn More: https://formbold.com -->
                    <div class="formbold-form-wrapper">
                        <form action="/addmaterial" method="POST">
                            <div class="formbold-form-title">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="auto" fill="#019455"
                                        class="bi bi-wrench-adjustable-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M12.496 8a4.491 4.491 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11c.027.2.04.403.04.61Z" />
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-1 0a7 7 0 1 0-13.202 3.249l1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.49 4.49 0 0 1-1.592-.29L4.747 14.2A7 7 0 0 0 15 8Zm-8.295.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27.596-.894Z" />
                                    </svg>
                                </p>
                                <h2 class="">Ajouter Materiel</h2>
                            </div>

                            <div class="formbold-mb-3">
                                <div>
                                    <label for="firstname" class="formbold-form-label">
                                        Type de Produit
                                    </label>
                                    <select id="type" class="formbold-form-input" height="80px" name="type">
                                        <option value="" selected></option>
                                        @foreach ($TypeProduits as $TypeProduit)
                                            <option value="{{ $TypeProduit->TypeProduit }}">{{ $TypeProduit->TypeProduit }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>
                            <div class="formbold-input-flex">
                              <div>
                                <label for="marque" class="formbold-form-label">
                                  Marque
                                </label>
                                <select id="marque" class="formbold-form-input" height="80px" name="marque" >
                                        <option value=""></option>
                                </select>
                                  
                              </div>
                              <div>
                                <label for="choix" class="formbold-form-label"> Type </label>
                                <select id="choix" class="formbold-form-input" height="80px" name="choix" >
                                    <option value=""></option>
                            </select>
                              </div>
                            </div>

                            <div id="dynamic-fields-container">

                            </div>
                            <div>
                                <label for="tag" class="formbold-form-label"> Tag de Produit </label>
                                <input type="text" name="tag" id="tag" class="formbold-form-input" required
                                    autocomplete="off" />
                                <span id="TagValidation" style="color: red;"></span>
                            </div>

                            <div class="formbold-mb-3">
                                <label for="mac" class="formbold-form-label">
                                    Adresse Mac
                                </label>
                                <input type="text" name="mac" id="mac" class="formbold-form-input"  autocomplete="off" required
                                    />
                                <span id="MacValidation" style="color: red;"></span>
                            </div>

                            <div class="formbold-mb-3">
                                <label for="address2" class="formbold-form-label">
                                    Numéro de facture
                                </label>
                                <input type="text" name="facture" id="facture" class="formbold-form-input" required
                                    autocomplete="off" />
                                <span id="InvoiceValidation" style="color: red;"></span>
                            </div>

                            <div class="formbold-input-flex">
                                <div>
                                    <label for="state" class="formbold-form-label"> Date d'achat </label>
                                    <input style="color: #019455;" type="date" name="achat" id="achat"
                                        class="formbold-form-input" required />
                                </div>
                                <div>
                                    <label for="fournisseur" class="formbold-form-label"> fournisseur </label>
                                    <select id="Produit" class="formbold-form-input" height="80px" name="fournisseur">
                                        @foreach ($values as $value)
                                            @if ($value->Foutnisseur != '')
                                                <option value="{{ $value->Foutnisseur }}">{{ $value->Foutnisseur }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="formbold-input-flex">
                                <div>
                                    <label for="area" class="formbold-form-label"> Site</label>
                                    <select id="site" class="formbold-form-input" name="site" height="80px">
                                        <option value="" style="display: none;"></option>
                                        @foreach ($sites as $site)
                                            <option value="{{ $site->Site }}">{{ $site->Site }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div>
                                    <label for="post" class="formbold-form-label"> Emplacement </label>
                                    <select id="emplacement" class="formbold-form-input" height="80px" name="emplacement">
                                    </select>
                                </div>

                            </div>

                            <div class="formbold-checkbox-wrapper">
                                <label for="supportCheckbox" class="formbold-checkbox-label">
                                    <div class="formbold-relative">
                                        <input type="checkbox" id="supportCheckbox" class="formbold-input-checkbox" />

                                    </div>
                                </label>
                                <button type="submit" id="submitButton" class="formbold-btn" disabled>Ajouter
                                    Produit</button>
                            </div>

                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        var submitButton = $('#submitButton');
                        $('#tag, #mac,#facture').on('keyup', function() {
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
                                success: function(response) {
                                    if (response.macExists || response.tagExists || response
                                        .invoiceExists) {
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
                <script>
                    $(document).ready(function() {
                        const siteSelect = $('#site');
                        const typeSelect = $('#type');
                        const marqueSelect = $('#marque');
                        const choixSelect = $('#choix');
                        const emplacementSelect = $('#emplacement');

                        // Add an event listener for the site select box change
                        siteSelect.on('change', function() {
                            const selectedSite = $(this).val();

                            // Make an AJAX request to fetch emplacement options based on the selected site
                            $.ajax({
                                url: '{{ route('getEmplacements') }}',
                                method: 'GET',
                                data: {
                                    site: selectedSite
                                },
                                success: function(response) {
                                    // Clear existing options in the emplacement select box
                                    emplacementSelect.empty();

                                    // Populate emplacement select box with fetched options
                                    $.each(response, function(key, value) {
                                        emplacementSelect.append($('<option>', {
                                            value: key,
                                            text: value
                                        }));
                                    });
                                },
                                error: function() {
                                    // Handle error if necessary
                                }
                            });
                        });
                        typeSelect.on('change', function() {
                            const selectedtype = $(this).val();

                            // Make an AJAX request to fetch emplacement options based on the selected site
                            $.ajax({
                                url: '{{ route('getMarque') }}',
                                method: 'GET',
                                data: {
                                    type: selectedtype
                                },
                                success: function(response) {
                                    // Clear existing options in the emplacement select box
                                    marqueSelect.empty();
                                    choixSelect.empty();
                                    let resp = response.marques;
                                    let resp2 = response.choix;
                                    console.log(resp);
                                    console.log(resp2);
                                    var marques = resp.marques;
                                    var choix = resp.choix;
                                    // Populate emplacement select box with fetched options
                                    $.each(resp, function(key, value) {
                                      if(key)
                                      marqueSelect.append($('<option>', {
                                            value: key,
                                            text: value
                                        }));
                                    });
                                    $.each(resp2, function(key, value) {
                                      choixSelect.append($('<option>', {
                                            value: key,
                                            text: value
                                        }));
                                    });
                                    
                                },
                                error: function() {
                                    // Handle error if necessary
                                }
                            });
                        });
                    });
                </script>
                <style>
                    #submitButton[disabled] {
                        background-color: #ccc;
                        /* Change to your desired color */
                        color: #666;
                        /* Change to your desired color */
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

                    #supportCheckbox:checked~div span {
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

                    .formbold-input-flex>div {
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
    @endsection    

    <style>
        /* Apply a transition to the scale and opacity properties of .box and .lab when hovered */
        .hovered {
            transform: scale(1.2);
            opacity: 0.9;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
    </style>
