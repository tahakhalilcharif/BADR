import torch
from transformers import GPT2LMHeadModel, GPT2Tokenizer

# Load pre-trained GPT-2 model and tokenizer
tokenizer = GPT2Tokenizer.from_pretrained("gpt2")
model = GPT2LMHeadModel.from_pretrained("gpt2")

# Set device to GPU if available
device = torch.device("cuda" if torch.cuda.is_available() else "cpu")
model.to(device)
model.eval()

def generate_response(query, max_length=50):
    input_ids = tokenizer.encode(query, return_tensors="pt").to(device)
    with torch.no_grad():
        output = model.generate(input_ids, max_length=max_length, num_return_sequences=1)
    
    response = tokenizer.decode(output[0], skip_special_tokens=True)
    
    return response

if __name__ == "__main__":
    query = "can i open a bank account"
    response = generate_response(query)
    print("Chatbot Response:", response)
