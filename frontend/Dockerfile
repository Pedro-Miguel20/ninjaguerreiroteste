FROM node:lts-alpine AS base

FROM base AS deps

RUN apk add --no-cache libc6-compat

WORKDIR /app/frontend

COPY package.json yarn.lock* package-lock.json* pnpm-lock.yaml* .npmrc* ./

RUN \
  if [ -f yarn.lock ]; then yarn --frozen-lockfile; \
  elif [ -f package-lock.json ]; then npm ci; \
  elif [ -f pnpm-lock.yaml ]; then corepack enable pnpm && pnpm i --frozen-lockfile; \
  else echo "Lockfile not found." && exit 1; \
  fi

FROM base AS builder

WORKDIR /app/frontend

RUN corepack enable

COPY --from=deps /app/frontend/node_modules ./node_modules

COPY . .

RUN mv .env.example .env

RUN pnpm build

FROM base AS runner

WORKDIR /app/frontend

ENV NODE_ENV=production

RUN addgroup -g 1001 -S nodejs

RUN adduser -S nextjs -u 1001

COPY --from=builder /app/frontend/public ./public

COPY --from=builder --chown=nextjs:nodejs /app/frontend/.next/standalone ./

COPY --from=builder --chown=nextjs:nodejs /app/frontend/.next/static ./.next/static

RUN chmod -R a-w+x . && chmod -R a+x .next node_modules

USER nextjs

EXPOSE 3000

ENV PORT=3000

ENV HOSTNAME="0.0.0.0"

CMD ["node", "server.js"]