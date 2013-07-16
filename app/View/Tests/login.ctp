<!-- <html>
<body>
	<?php
			echo $this->Form->create('Likes',
				array('type'=>'post','action'=>'index'));

			echo $this->Form->label('ID');
			echo $this->Form->text('id');
			echo $this->Form->label('Photo ID');
			echo $this->Form->text('photo_id');
			echo $this->Form->label('Token');
			echo $this->Form->text('token');
			echo $this->Form->end('Test');
			?>
</body>
</html> -->

<form action="uploadphotos" method="post" enctype="multipart/form-data">
    Upload an image for processing<br>
    <input type="file" name="data['image']"><br>
    <input type="submit" value="Upload">
</form>