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


update_image(build_image_path('AGreen.jpg'), 'AGreen')
update_image(build_image_path('APatel.jpg'), 'APatel')
update_image(build_image_path('APeterson12.jpg'), 'APeterson12')
update_image(build_image_path('BenjCollins.jpg'), 'BenjCollins')
update_image(build_image_path('CChen.jpg'), 'CChen')
update_image(build_image_path('DWilson14.jpg'), 'DWilson14')
update_image(build_image_path('EmilyDavis.jpg'), 'EmilyDavis')
update_image(build_image_path('EChen.jpg'), 'EChen')
update_image(build_image_path('JamesDavis.jpg'), 'JamesDavis')
update_image(build_image_path('JMurphy.jpg'), 'JMurphy')
update_image(build_image_path('JessicaRamirez15.jpg'), 'JessicaRamirez15')
update_image(build_image_path('MCooper.jpg'), 'MCooper')
update_image(build_image_path('MBrown1.jpg'), 'MBrown1')
update_image(build_image_path('SKim.jpg'), 'SKim')
update_image(build_image_path('SarahJohnson7.jpg'), 'SarahJohnson7')
update_image(build_image_path('TWilliams.jpg'), 'TWilliams')
