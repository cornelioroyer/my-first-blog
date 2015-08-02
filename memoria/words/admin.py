from django.contrib import admin
from words.models import Words

class WordsAdmin(admin.ModelAdmin):
	fields = ['english','spanish','created','puntos']
	list_display = ('english', 'spanish', 'puntos')
	list_filter = ['created']
	search_fields = ['spanish','english']

admin.site.register(Words, WordsAdmin)


# Register your models here.
