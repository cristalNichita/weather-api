# Laravel Weather API (OpenWeatherMap)

---

## Quick Start (Docker)

```bash
git clone https://github.com/your-username/weather-api.git
cd weather-api
cp .env.example .env
docker compose up -d --build
```

Once containers are up, open:

```
http://localhost:8000/api/weather?city=Omsk
```

---

## 🔐 .env Configuration

Add your OpenWeatherMap API key to the `.env` file:

```dotenv
OPENWEATHER_API_KEY=your_api_key_here
```

> No database is used in this project.

---

## API Endpoint

```
GET /api/weather?city=Omsk
```

### Successful Response

```json
{
  "city": "Omsk",
  "temperature": 21,
  "description": "clear sky",
  "wind": 3.5,
  "pressure": 751,
  "humidity": 58,
  "cloudiness": 0,
  "icon": "01d"
}
```

### Validation Error

```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "city": ["The city field is required."]
  }
}
```

### City Not Found

```json
{
  "success": false,
  "message": "City not found"
}
```

---

## Running Tests

```bash
php artisan test
```

---

## Principles Applied

- **SOLID** — clean separation, dependency injection
- **DRY** — reusable error handling & structure
- **KISS** — minimal & focused class responsibilities
- **Testable** — service and repository fully covered

---

## Docker Notes

- PHP 8.3 + FPM in `docker/php/Dockerfile`
- Nginx configured in `docker/nginx/default.conf`
- Laravel app served via `http://localhost:8000`
