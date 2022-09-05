# Imports PIL module
import PIL
from PIL import Image
from PIL import ImageFont
from PIL import ImageDraw 
import random
import string
import hashlib
from hashlib import sha1

def get_random_string(length):
    # choose from all lowercase letter
    letters = string.ascii_lowercase
    result_str = ''.join(random.choice(letters) for i in range(length))
    return result_str

text = get_random_string(6)

h = hashlib.new('sha256')

toHash = text.encode()
h.update(toHash)

h = h.hexdigest()

print(h)
print(text)
text = ' '.join(text).strip() 
 
# creating a image object (new image object) with
# RGB mode and size 200x200
img = PIL.Image.new(mode = "RGB", size = (300, 100),
                           color = (205, 205, 205))
draw = ImageDraw.Draw(img)
draw.rectangle((0, 0, 299, 99), outline='black')
# specified font size
font = ImageFont.truetype(r'C:\Users\marti\code\py\Buggie-L3y03.ttf', 40) 

draw.text((35, 30),text,fill="green", font = font, align="center")
draw.ellipse([(30, 0), (500, 200)], fill=None, outline='green', width=2)

draw.ellipse([(150, -50), (800, 200)], fill=None, outline='green', width=2)
# This method will show image in any image viewer
img.show()