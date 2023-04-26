import sqlite3
import os

def update_image(filepath, username):
    try:
        with open(filepath, 'rb') as f:
            imageData = f.read()
    except FileNotFoundError:
        print(f"Error: File '{filepath}' not found")
        return

    conn = sqlite3.connect('database.db')

    query = "UPDATE Client SET user_image = ? WHERE username = ?"
    params = (imageData, username)
    conn.execute(query, params)

    conn.commit()
    conn.close()


def build_image_path(image_name):
    script_dir = os.path.dirname(os.path.abspath(__file__))
    return os.path.join(script_dir, '..', 'assets', 'profile_pics_examples', image_name)


update_image(build_image_path('adam_green.jpg'), 'AGreen')
update_image(build_image_path('andrew_patel.jpg'), 'APatel')
update_image(build_image_path('andrew_peterson.jpg'), 'APeterson12')
update_image(build_image_path('benjamin_collins.jpg'), 'BenjCollins')
update_image(build_image_path('christopher_chen.jpg'), 'CChen')
update_image(build_image_path('daniel_wilson.jpg'), 'DWilson14')
update_image(build_image_path('emily_davis.jpg'), 'EmilyDavis')
update_image(build_image_path('ethan_chen.jpg'), 'EChen')
update_image(build_image_path('james_davis.jpg'), 'JamesDavis')
update_image(build_image_path('jessica_murphy.jpg'), 'JMurphy')
update_image(build_image_path('jessica_ramirez.jpg'), 'JessicaRamirez15')
update_image(build_image_path('mathew_cooper.jpg'), 'MCooper')
update_image(build_image_path('michael_brown.jpg'), 'MBrown1')
update_image(build_image_path('samantha_kim.jpg'), 'SKim')
update_image(build_image_path('sarah_johnson.jpg'), 'SarahJohnson7')
update_image(build_image_path('tyler_williams.jpg'), 'TWilliams')
