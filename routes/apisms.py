import base64

api_key = "w6sW0tcM0h-N0D8s9AibGh8DrLESlxM6"
encoded_key = base64.b64encode(api_key.encode()).decode()
print(encoded_key)