import datetime
from django.db import models
from django.utils import timezone
from django.contrib.auth.models import User


class Words(models.Model):
	english = models.CharField(max_length=300, null=True, db_index=True, unique=True)
	spanish = models.CharField(max_length=300, null=True, db_index=True, unique=True)
	d_spanish = models.CharField(max_length=300, null=True, db_index=True, unique=False)
	d_english = models.CharField(max_length=300, null=True, db_index=True, unique=False)
	puntos = models.IntegerField(default=0)
	mistakes = models.IntegerField(default=0)
	type_question = models.IntegerField(default=1, null=True, db_index=False, unique=False)
	next_question = models.DateField(null=False, db_index=True, unique=False, default=datetime.date.today())
	created = models.DateTimeField('fecha hora de creacion', null=True, default=timezone.now())
	updated = models.DateTimeField('fecha hora update', null=True, default=timezone.now())
	user = models.ForeignKey(User, unique=False, default=1, null=False)

	def __str__(self):
		return self.english

	def was_published_recently(self):
		return self.created >= timezone.now() - datetime.timedelta(days=1)

	was_published_recently.admin_order_field = 'created'		
	was_published_recently.boolean = True
	was_published_recently.short_description = 'Fecha de Creacion'

class Opciones(models.Model):
	words1 = models.ForeignKey(Words, unique=False, default=1, null=False)
	words2 = models.ForeignKey(Words, unique=False, default=1, null=False, related_name='fk_words2')
	d_spanish = models.CharField(max_length=300, null=True, db_index=True, unique=False)
	d_english = models.CharField(max_length=300, null=True, db_index=True, unique=False)

	def __str__(self):
		return self.d_spanish

