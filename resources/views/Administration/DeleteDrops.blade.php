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
        // Remove existing dynamic tables, if any
        dynamicFieldsContainer.find('.dynamic-table').remove();

        // Handle each selected option
        if (selectedOption === 'type') {
            // Send an AJAX GET request to retrieve type data
            $.ajax({
                url: '{{ route('getTypes') }}',
                method: 'GET',
                success: function (response) {
                    // Create a new table element
                    var tableElement = $('<table>', {
                        'class': 'display'
                    });
                    
                    // Create table headers
                    var tableHeaders = $('<thead><tr><th>Type de Produit</th></tr></thead>');
                    tableElement.append(tableHeaders);
                    // Create table rows
                    var tableBody = $('<tbody>');
                        $.each(response, function (key, value) {
                        var row = $('<tr>');
                        row.append($('<td>').text(value.TypeProduit));
                          
                        // Add a delete button to each row
                        var deleteButton = $('<button>', {
                            'class': 'delete-button',
                            'text': 'Delete',
                            'data-id': value.id // You can use the 'data-id' attribute to store the row's unique identifier (e.g., ID)
                        });
    
    // Attach a click event handler to the delete button
    deleteButton.on('click', function () {
        var rowId = $(this).data('id');
        
        // Add your logic here to handle the deletion of the row with 'rowId'
        // You can use AJAX to send a request to delete the corresponding record
        // For example:
      
    });
    
    // Append the delete button to the row
    row.append($('<td>').append(deleteButton));
    
    // Append the row to the table body
    tableBody.append(row);
                          
});
                    tableElement.append(tableBody);

                    dynamicFieldsContainer.append(tableElement);
                },
                error: function () {
                    // Handle error if necessary
                }
            });
        } else if (selectedOption === 'marque') {
            // Send an AJAX GET request to retrieve marque data
            $.ajax({
                url: '{{ route('getMarques') }}',
                method: 'GET',
                success: function (response) {
                    // Create a new table element
                    var tableElement = $('<table>', {
                        'class': 'formbold-table dynamic-table'
                    });

                    // Create table headers
                    var tableHeaders = $('<thead><tr><th>Marque</th></tr></thead>');
                    tableElement.append(tableHeaders);

                    // Create table rows
                    var tableBody = $('<tbody>');
                    $.each(response, function (key, value) {
                        tableBody.append($('<tr>').append($('<td>').text(value.Marque)));
                    });
                    tableElement.append(tableBody);

                    dynamicFieldsContainer.append(tableElement);
                },
                error: function () {
                    // Handle error if necessary
                }
            });
        }
        // Add similar logic for other options (choix, fournisseur, etc.)
    }

    // Initialize dynamic fields based on the selected option
    selectType.on('change', function () {
        const selectedType = $(this).val();
        createDynamicFields(selectedType);
    });

    // Handle form submission (you can customize this as needed)
    saveButton.on('click', function () {
        // Add your logic to handle form submission here
        // You can retrieve values from the dynamic tables
    });
});
</script>
@endsection


  
    <style>
      /* Apply a transition to the scale and opacity properties of .box and .lab when hovered */
      .hovered {
        transform: scale(1.2);
        opacity: 0.9;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
      }
    </style>