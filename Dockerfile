# Use the official PHP image with Apache
FROM php:8.1-apache

# Copy PHP files into the container
COPY . /var/www/html/

# Set permissions for the web root directory
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
