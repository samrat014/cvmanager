# import docx2txt # For extracting text from docx file
# import fitz # For extracting text from  pdf
# import PyPDF2 # Another package for extracting text from pdf
# import re
# import os
#
# def allowedExtension(filename):
#     return '.' in filename and filename.rsplit('.', 1)[1].lower() in ['docx', 'pdf']
# def extractData(file, ext):
#     text = ""
#     if ext == "docx":
#         temp = docx2txt.process(file)
#         text = ' '.join(line.replace('\t', ' ') for line in temp.split('\n') if line)
#     elif ext == "pdf":
#         for page in fitz.open(file):
#             text += page.get_text()
#         text = " ".join(text.split('\n'))
#         print(text)
#     # Extract relevant information based on the CV structure
#     name = extract_name_from_text(file)
#     email = extract_email_from_text(text)
#     phone = extract_phone_from_text(text)
#     address = extract_address_from_text(text)
#     experience = extract_experience_from_text(text)
#     # Return the extracted information as a dictionary or in a desired format
#     cv_data = {
#         'Name': name,
#         'Address': address,
#         'Phone': phone,
#         'Email': email,
#         'Experience': experience
#     }
#     return cv_data
# def extract_name_from_text(path):
#     file_name = os.path.basename(path)
#     name = os.path.splitext(file_name)[0]
#     return name
# def extract_email_from_text(text):
#     # Extract logic for email extraction
#     emails= ''
#     extracted_emails = re.findall(r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b', text)
#     for email in extracted_emails:
#         if email.endswith(".com"):
#             emails = email
#         else:
#             emails = 'not found'
#     return emails
# def extract_phone_from_text(text):
#     # Extract logic for phone extraction
#     number = ''
#     extracted_num = re.findall(r'\d{10}', text)
#     # extracted_num = re.findall(r'[0-9-]+[0-9-]+[0-9]', text)
#     for num in extracted_num:
#       num_len = len(num)
#       if (num_len == 10):
#         number = num
#       else:
#         number = 'not found'
#     return number
# def extract_address_from_text(text):
#     # Extract logic for address extraction
#     addresses = ''
#     # extracted_address = re.findall(r'\b\d+\s+\w+\s+\w+\s*,?\s*\w*\s*\d+\b', text)
#     # extracted_address = re.findall(r'\d{1,3}\s\w+\s\w+,\s\w+,\s\w+\s\d{5}', text)
#     extracted_address = re.findall(r'\b[A-Za-z]\w{3,15}-\d{1,2}?,?\s\w{3,15}\b', text)
#     for address in extracted_address:
#       addresses = address
#     return addresses
# def extract_experience_from_text(text):
#     # Extract logic for experience extraction
#     pass
# # Rosa Maria Aguado
# # Steve Wilson
# filename = './Steve Wilson.pdf'
# if allowedExtension(filename):
#     file_extension = filename.rsplit('.', 1)[1].lower()
#     print(file_extension)
#     extracted_text = extractData(filename, file_extension)
#     print(extracted_text)
#     print(type(extracted_text))
# else:
#     print("File extension not allowed.")

def provide():
    return "hello"

print(provide())
