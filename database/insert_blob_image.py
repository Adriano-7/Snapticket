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
update_image(build_image_path('christopher_chen.jpg'), 'CChen')
update_image(build_image_path('james_davis.jpg'), 'JamesDavis')
update_image(build_image_path('jessica_murphy.jpg'), 'JMurphy')
update_image(build_image_path('jessica_ramirez.jpg'), 'JessicaRamirez15')
