<select class="selectpicker" name="district" id="searchHome_district" data-style="btn" data-title="Select District" data-size="5">
      <option>Select District</option>
     <?php $count = 0; ?>
	<?php foreach ($districts as $item): ?>
		<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
	<?php $count++ ?>
	<?php endforeach ?>
      
</select>