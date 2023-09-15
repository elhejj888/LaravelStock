<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de mise à jour de label</title>
</head>
<body>
    <select id="type" class="formbold-form-input" height="80px" name="type">
        <option value="" selected></option>
        <option value="Casque">Casque</option>
        <option value="Ecran">Ecran</option>
        <option value="Unité central">Unité central</option>
        <option value="clavier">clavier</option>
    </select>
    
    <div class="formbold-mb-3">
        <label for="mac" class="formbold-form-label">
            Adresse Mac
        </label>
        <input type="text" name="mac" id="mac" class="formbold-form-input" required autocomplete="off" />
        <span id="MacValidation" style="color: red;"></span>
    </div>

    <script>
        document.getElementById('type').addEventListener('change', function() {
            var selectedValue = this.value;
            var macLabel = document.querySelector('label[for="mac"]');
            var macInput = document.getElementById('mac');
            
            if (selectedValue === 'Casque' || selectedValue === 'Ecran') {
                macLabel.textContent = 'SIN';
                macInput.placeholder = 'SIN';
            } else {
                macLabel.textContent = 'Adresse Mac';
                macInput.placeholder = '';
            }
        });
    </script>
</body>
</html>
