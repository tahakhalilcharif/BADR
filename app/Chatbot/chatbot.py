from transformers import BertTokenizer, BertModel
tokenizer = BertTokenizer.from_pretrained('bert-base-multilingual-uncased')
model = BertModel.from_pretrained("bert-base-multilingual-uncased")
text = "Hello."
encoded_input = tokenizer(text, return_tensors='pt')
output = model(**encoded_input)
